<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('book.index', compact('books', 'categories'));
    }

    public function filter($category)
    {
        $books = Book::where('category_id', $category)->get();
        $categories = Category::all();
        return view('book.index', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $validates = $request->validate([
                'judul_buku' => 'required',
                'deskripsi' => 'required',
                'jumlah_buku' => 'required',
                'file_buku' => 'required|file|mimes:pdf',
                'cover_buku' => 'required|file|mimes:jpg,jpeg,png',
                'category_id' => 'required',
            ]);

            $file_buku = $request->file('file_buku');
            $file_buku_name = time() . '-' . $file_buku->getClientOriginalName() . rand(1, 100);
            $file_buku_path = $file_buku->storeAs('public/file_buku', $file_buku_name);
            $pathDatabaseInit = 'file_buku/' . $file_buku_name;

            $cover_buku = $request->file('cover_buku');
            $cover_buku_name = time() . '-' . $cover_buku->getClientOriginalName() . rand(1, 100);
            $cover_buku_path = $cover_buku->storeAs('public/cover_buku', $cover_buku_name);
            $pathDatabaseCover = 'cover_buku/' . $cover_buku_name;

            $dataRequest = [
                'user_id' => auth()->user()->id,
                'judul_buku' => $validates['judul_buku'],
                'deskripsi' => $validates['deskripsi'],
                'jumlah_buku' => $validates['jumlah_buku'],
                'file_buku' => $pathDatabaseInit,
                'cover_buku' => $pathDatabaseCover,
                'category_id' => $validates['category_id'],
            ];

            $storeData = Book::create($dataRequest);

            if (!$storeData) {
                return redirect()->back()->with('error', 'Gagal menambahkan data buku');
            }

            return redirect()->back()->with('success', 'Berhasil menambahkan data buku');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $validates = $request->validate([
                'judul_buku' => 'required',
                'deskripsi' => 'required',
                'jumlah_buku' => 'required',
                'file_buku' => 'file|mimes:pdf',
                'cover_buku' => 'file|mimes:jpg,jpeg,png',
                'category_id' => 'required',
            ]);

            $data = Book::find($request->id);
            $data->judul_buku = $validates['judul_buku'];
            $data->deskripsi = $validates['deskripsi'];
            $data->jumlah_buku = $validates['jumlah_buku'];
            $data->category_id = $validates['category_id'];

            if ($request->hasFile('file_buku')) {
                $file_buku = $request->file('file_buku');
                $file_buku_name = time() . '-' . $file_buku->getClientOriginalName() . rand(1, 100);
                $file_buku_path = $file_buku->storeAs('public/file_buku', $file_buku_name);
                $pathDatabaseInit = 'file_buku/' . $file_buku_name;
                $data->file_buku = $pathDatabaseInit;
            }

            if ($request->hasFile('cover_buku')) {
                $cover_buku = $request->file('cover_buku');
                $cover_buku_name = time() . '-' . $cover_buku->getClientOriginalName() . rand(1, 100);
                $cover_buku_path = $cover_buku->storeAs('public/cover_buku', $cover_buku_name);
                $pathDatabaseCover = 'cover_buku/' . $cover_buku_name;
                $data->cover_buku = $pathDatabaseCover;
            }

            $updateData = $data->save();

            if (!$updateData) {
                return redirect()->back()->with('error', 'Gagal mengupdate data buku');
            }

            return redirect()->back()->with('success', 'Berhasil mengupdate data buku');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Book::find($id);
            $deleteData = $data->delete();

            if (!$deleteData) {
                return redirect()->back()->with('error', 'Gagal menghapus data buku');
            }

            return redirect()->back()->with('success', 'Berhasil menghapus data buku');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function downloadFileBuku($id)
    {
        $data = Book::find($id);
        return response()->download(storage_path('app/public/' . $data->file_buku));
    }

    public function downloadCoverBuku($id)
    {
        $data = Book::find($id);
        return response()->download(storage_path('app/public/' . $data->cover_buku));
    }

    public function exportExcel()
    {
        return Excel::download(new BookExport(), 'data_buku.xlsx');
    }
}
