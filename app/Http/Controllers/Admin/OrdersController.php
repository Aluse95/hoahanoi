<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index() {

        $data = OrderList::paginate(6);

        return view('admin.order.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.order.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'price' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $order = new OrderList;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->product = $request->product;
        $order->price = $request->price;
        $order->email = $request->email;
        $order->note = $request->note;
        $order->save();

        return redirect()->route('admin.order');
    }

    public function getEdit($id) {

        $item = OrderList::find($id);

        return view('admin.order.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'price' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $order = OrderList::find($id);
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->product = $request->product;
        $order->price = $request->price;
        $order->email = $request->email;
        $order->note = $request->note;
        $order->save();

        return redirect()->route('admin.order');
    }

    public function del($id) {

        $order = OrderList::find($id);

        $order->delete();

        return redirect()->route('admin.order');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['order_id'] as $id) {

            $order = OrderList::find($id);

            $order->delete();
        }

        return redirect()->route('admin.order');
    }

    public function complete(Request $request) {

        $data = $request->all();

        $order = OrderList::find($data['id']);

        $order->status = 1;

        $order->save();

        return;
    }
}
