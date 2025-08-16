<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repository\OrderRepository;
use App\Service\OrderService;
use App\Events\OrderCreated;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Order;
use Throwable;

class OrderController extends Controller
{
    protected OrderService $orderService;
    protected OrderRepository $orderRepo;

    public function __construct(OrderService $orderService, OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderService = $orderService;
    }

    public function index(): View|RedirectResponse
    {
        try {
            $orders = $this->orderService->getOrders();
            return view('admin.pages.orders.index', compact('orders'));
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function create(): View
    {
        return view('admin.pages.orders.create');
    }

    public function store(CreateOrderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Total bo‘sh bo‘lsa, 0 bo‘lsin
        $validated['total'] = $validated['total'] ?? 0;

        $order = $this->orderRepo->create($validated);

        // Telegramga xabar yuborish endi event orqali
        event(new OrderCreated($order));

        return redirect()->route('admin.orders.index')->with('success', 'Buyurtma muvaffaqiyatli yaratildi!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        try {
            $order = $this->orderService->findOrderById($id);
            return view('admin.pages.orders.edit', compact('order'));
        } catch (Throwable $th) {
            return $this->viewException($th);
        }
    }

    public function update(UpdateOrderRequest $request, int $id): RedirectResponse
    {
        try {
            $order = $this->orderService->findOrderById($id);

            // Eski statusni saqlab qolamiz
            $oldStatus = $order->status;

            // Yangilash
            $this->orderService->updateOrder($id, $request->validated());

            // Agar status o‘zgargan bo‘lsa, Telegramga xabar yuborish
            if ($request->has('status') && $request->status !== $oldStatus) {
                $message = "📦 Buyurtma #{$order->order_number} statusi yangilandi: *" . strtoupper($request->status) . "*";
                app(\App\Service\TelegramNotificationService::class)->send($message);
            }

            return redirect()->route('admin.orders.index')->with('success', 'Buyurtma muvaffaqiyatli yangilandi!');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Xatolik yuz berdi: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->orderService->deleteOrder($id);
        return redirect()->route('admin.orders.index')->with('success', 'Buyurtma muvaffaqiyatli o‘chirildi!');
    }

    public function viewException(Throwable $th): RedirectResponse
    {
        return redirect()->back()->with('error', $th->getMessage());
    }

    public function show($id): RedirectResponse
    {
        $order = Order::with('items.product')->findOrFail($id);
        return redirect()->route('admin.orders.show', $order->id);
    }
}
