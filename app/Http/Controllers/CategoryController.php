<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Category;
use Datatables;
use View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.contact');

    }
    public function getall()
    {
       $contact = Category::orderBy('id', 'desc');
       return datatables($contact)
         //  ->setRowAttr(['align' => 'center'])
         // ->addColumn('status', function ($contact) {
         //    return $contact->status ? 'Active' : 'Inactive';
         // })
         ->addColumn('created_at', function ($contact) {
            return $contact->created_at->diffForHumans();
         })
         ->addColumn('updated_at', function ($contact) {
            return $contact->updated_at->diffForHumans();
         })
         ->addColumn('action', 'admin.category.action')
         ->make(true);
    }
    public function create()
    {

       $view = View::make('admin.category.create')->render();
       return response()->json(['html' => $view]);
    }
    public function store(Request $request)
    {
       //
       $request->validate([
         'name' => 'required|unique',

       ]);
       $contact = new Category;
       $contact->name = $request->name;
       $contact->save(); //
       return response()->json(['html' => 'Successfully Inserted']);
    }
    public function show(Category $contact)
   {
      //
      $view = View::make('admin.category.view', compact('contact'))->render();

      return response()->json(['html' => $view]);
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $contact)
    {

       $view = View::make('admin.category.edit', compact('contact'))->render();

       return response()->json(['html' => $view]);
    }

    public function update(Request $request, Category $contact)
    {
       //
       $contact->name = $request->name;

       $contact->save(); //
       return response()->json(['html' => 'Successfully Updated']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $contact)
    {
       //
       $contact->delete();
       return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
    }
}
