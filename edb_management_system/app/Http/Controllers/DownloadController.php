<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function format_one_download()
    {
        $filepath = public_path('assets\doc\100% CKD List Under SRO-656.xlsx');
        return Response::download($filepath);
    }

    public function format_two_download()
    {
        $filepath = public_path('assets\doc\100% CKD List Under SRO-693.xlsx');
        return Response::download($filepath);
    }
}