<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApartmentCategory;
use App\Models\ApartmentImage;
use App\Models\Category;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    protected $apartmentRepository;

    public function __construct(ApartmentInterfaceRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function index()
    {
        return view('admin.apartments.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::where('status', 1)->get();
        return view('admin.apartments.add', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->image;
        $check = serialize($request->post_id);
        $request->merge(['post_id' => $check]);
        $request->merge(['image' => getImage($img, 'products')]);
        $detail_apartment = $this->apartmentRepository->create($request->all());

        if ($request->category_id) {
            $check = rtrim($request->category_id, ',');
            $check2 = explode(',', $check);
            foreach ($check2 as $value) {
                $apartment_category = new ApartmentCategory();
                $apartment_category->apartment_id = $detail_apartment->id;
                $apartment_category->category_id = $value;
                $apartment_category->save();
            }
        }

        if (!empty($request->link)) {
            foreach ($request->link as $value) {
                $apartment_category = new ApartmentImage();
                $apartment_category->apartment_id = $detail_apartment->id;
                $apartment_category->link = getImage($value, 'product_detail');
                $apartment_category->save();
            }
        }

        return redirect()->route('apartments.index')->with('info_add', 'Add new Products .. ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
