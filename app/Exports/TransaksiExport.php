<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $transaksi;
    private $rowNumber = 0;

    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function collection()
    {
        return $this->transaksi;
    }

    public function headings(): array
    {
        return [
            'No',
            'Siswa',
            'Buku',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status'
        ];
    }

    public function map($transaksi): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $transaksi->user->nama ?? '-',
            $transaksi->buku->judul ?? '-',
            $transaksi->tanggal_pinjam,
            $transaksi->tanggal_kembali,
            $transaksi->status
        ];
    }
}
