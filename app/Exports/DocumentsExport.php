<?php

namespace App\Exports;

use App\Document;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use DB;

class DocumentsExport implements FromCollection, WithHeadings,WithStrictNullComparison
{


   public function collection()
    {
        $documents = DB::table('documents')
        ->where('documents.deleted_at',null)
        ->select('documents.name', 'documents.address', 'documents.email','documents.date','documents.time')
        ->get();

        return $documents;
    }


    public function headings(): array
    {
        return [

            'name',
            'address',
            'email',
            'date',
            'time',
        ];
    }
}
