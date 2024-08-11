<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesInit = Category::with('books')->get();
        $categories = [];

        foreach ($categoriesInit as $category) {
            $total = 0;

            foreach ($category->books as $book) {
                $total += $book->jumlah_buku;
            }

            $categories[] = [
                'id' => $category->id,
                'name' => $category->name,
                'total' => $total,
            ];
        }

        return view('category.index', compact('categories'));
    }

    public function show($id)
    {
        $bookCategories = Book::where('category_id', $id)->get();
        return view('category.show', compact('bookCategories'));
    }

    public function store(Request $request)
    {
        $validates = $request->validate([
            'name' => 'required',
        ]);

        $storeData = Category::create($validates);
        if (!$storeData) {
            return redirect()->back()->with('error', 'Gagal menambahkan data kategori');
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data kategori');
    }

    public function update(Request $request, $id)
    {
        $validates = $request->validate([
            'name' => 'required',
        ]);

        $updateData = Category::where('id', $id)->update($validates);
        if (!$updateData) {
            return redirect()->back()->with('error', 'Gagal mengubah data kategori');
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data kategori');
    }

    public function destroy($id)
    {
        $deleteData = Category::where('id', $id)->delete();
        if (!$deleteData) {
            return redirect()->back()->with('error', 'Gagal menghapus data kategori');
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data kategori');
    }
}
