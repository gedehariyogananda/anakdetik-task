<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;

class BookExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

    protected $data;

    public function __construct()
    {
        $books = Book::with('user', 'category')->get();

        $this->data = $books->map(function ($book) {
            return [
                'Nama Pembuat Buku' => $book->user->name,
                'Judul Buku' => $book->judul_buku,
                'Deskripsi' => $book->deskripsi,
                'Jumlah Buku' => $book->jumlah_buku . " buku",
                'Kategori' => $book->category->name,
                'File Buku' => env('APP_URL') . '/storage/' . $book->file_buku,
                'Cover Buku' => env('APP_URL') . '/storage/' . $book->cover_buku
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Pembuat Buku',
            'Judul Buku',
            'Deskripsi',
            'Jumlah Buku',
            'Kategori',
            'File Buku',
            'Cover Buku'
        ];
    }

    public function collection()
    {
        return $this->data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Tambahkan hyperlink untuk kolom "File Buku"
                foreach ($sheet->getRowIterator(2) as $rowIndex => $row) {
                    $cell = $sheet->getCellByColumnAndRow(6, $rowIndex);
                    $cell->getHyperlink()->setUrl($cell->getValue());
                    $cell->getStyle()->getFont()->setUnderline(true);
                    $cell->getStyle()->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE));
                }

                // Tambahkan hyperlink untuk kolom "Cover Buku"
                foreach ($sheet->getRowIterator(2) as $rowIndex => $row) {
                    $cell = $sheet->getCellByColumnAndRow(7, $rowIndex);
                    $cell->getHyperlink()->setUrl($cell->getValue());
                    $cell->getStyle()->getFont()->setUnderline(true);
                    $cell->getStyle()->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE));
                }

                // Style untuk header
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13, // Ukuran font
                        'color' => ['argb' => 'FFFFFF'], // Warna font
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'A2678A'],
                    ],
                ]);

                // Tambahkan teks di sel K3
                $event->sheet->setCellValue('K3', 'Keterangan :');
                $event->sheet->setCellValue('K4', 'Untuk melihat file buku, silahkan klik link di kolom File Buku');
                $event->sheet->setCellValue('K5', 'Untuk melihat cover buku, silahkan klik link di kolom Cover Buku');
            },
        ];
    }
}
