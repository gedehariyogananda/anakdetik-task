<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('jumlah_buku', 'desc')->take(5)->get();

        $categories = Category::with('books')->get();
        $categoryData = [];

        foreach ($categories as $category) {
            $total = 0;

            foreach ($category->books as $book) {
                $total += $book->jumlah_buku;
            }

            $categoryData[] = [
                'name' => $category->name,
                'total' => $total
            ];
        }

        usort($categoryData, function ($a, $b) {
            return $b['total'] - $a['total'];
        });

        $topCategories = array_slice($categoryData, 0, 5);

        return view('dashboard.index', compact('books', 'topCategories'));
    }
}
