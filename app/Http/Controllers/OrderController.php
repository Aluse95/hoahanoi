<?php namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller {

	public function index()
	{
		if(session()->has('customer')) {

			$total = 0;
			$user = Users::where('email', session('customer'))->first();
			$data = $user->product;
	
			return view('client.order')
			->with('data', $data)
			->with('total', $total);
		} else {

			return redirect('login');
		}
	}

	public function add(Request $request)
	{
		// session()->forget('customer');
		if(session()->has('customer')) {

			$validate = $request->validate([
				'quantity' => 'required|integer',
				'product_id' => 'required'
			]);
			
			$user = Users::where('email', session('customer'))->first();
			$data = $user->product;

			$pro = new Order;
			$pro->quantity = $request->input('quantity');
			$pro->product_id = $request->input('product_id');
			$pro->user_id = $user->id;

			$product = [];

			if($data->count() > 0) {

				foreach($data as $item) {

					$product[$item['id']] = $item->pivot->quantity;
				}

				if(array_key_exists($pro->product_id, $product)) {
		
					$pro->quantity = $product[$pro->product_id] + $request->input('quantity');
		
					$update = Order::where('user_id', $user->id)
					->where('product_id', $pro->product_id )->first();
		
					$update->quantity = $pro->quantity;
		
					$update->save();
		
				} else {
	
					$pro->save();
				}

			} else {

				$pro->save();
			}

			return redirect('cart');

		} else {

			return redirect('login');
		}
	}

	public function update(Request $request)
	{
		$user = Users::where('email', session('customer'))->first();

		$params = $request->all();
		
		// foreach($params['flower'] as $val) {

		// 	$data[$val] = $params['quantity_' . $val];

		// }
		// dd($params);
		
		foreach($params['flower'] as $key => $value) {

			$item = Order::where('user_id', $user->id)
			->where('product_id', $key )->first();

			if($value > 0) {

				$item->quantity = $value;

				$item->save();

			} else {

				$item->delete();
			}
		}

		return redirect('cart')->with('message', 'Cập nhật đơn hàng thành công');
	}

	public function delete($id)
	{
		$item = Order::find($id);

		$item->delete();

		return redirect('cart');
	}

	public function detail() {

		if(session()->has('customer')) {

			$total = 0;
			$user = Users::where('email', session('customer'))->first();
			$data = $user->product;
	
			return view('client.payment')
			->with('data', $data)
			->with('total', $total);
		} else {

			return redirect('login');
		}
	}

}
