<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index() {

        $data = Discount::paginate(6);

        return view('admin.discount.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.discount.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'sale_off' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $discount = new Discount;
        $discount->name = $request->name;
        $discount->sale_off = $request->sale_off/100;
        $discount->save();

        return redirect()->route('admin.discount');
    }

    public function getEdit($id) {

        $item = Discount::find($id);

        return view('admin.discount.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'sale_off' => 'required',
            'status' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $discount = Discount::find($id);
        $discount->name = $request->name;
        $discount->sale_off = $request->sale_off/100;
        $discount->status = $request->status;
        $discount->save();

        return redirect()->route('admin.discount');
    }

    public function del($id) {

        $discount = Discount::find($id);

        $discount->delete();

        return redirect()->route('admin.discount');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['discount_id'] as $id) {

            $discount = Discount::find($id);

            $discount->delete();
        }

        return redirect()->route('admin.discount');
    }
}
