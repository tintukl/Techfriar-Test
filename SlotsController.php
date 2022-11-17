<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class SlotsController extends Controller
{
    
    public function bookSlot(Request $request) 
    {
        $available_slots = ['A01','A02','A03','A04','A05',
        'B01','B02','B03','B04','B05',
        'A01','A02','A03','A04','A05',
        'C01','C02','C03','C04','C05', 'D01','D02','D03','D04','D05', 'E01','E02','E03','E04','E05', 'F01','F02','F03','F04','F05', 'G01','G02','G03','G04','G05',
        'H01','H02','H03','H04','H05', 'I01','I02','I03','I04','I05', 'J01','J02','J03','J04','J05', 'K01','K02','K03','K04','K05', 'L01','L02','L03','L04','L05',
        'M01','M02','M03','M04','M05', 'N01','N02','N03','N04','N05', 'O01','O02','O03','O04','O05', 'P01','P02','P03','P04','P05', 'Q01','Q02','Q03','Q04','Q05',
        'R01','R02','R03','R04','R05', 'S01','S02','S03','S04','S05', 'T01','T02','T03','T04','T05', 'U01','U02','U03','U04','U05', 'V01','V02','V03','V04','V05',
        'W01','W02','W03','W04','W05', 'X01','X02','X03','X04','X05', 'Y01','Y02','Y03','Y04','Y05', 'Z01','Z02','Z03','Z04','Z05'
    ];
        $slot = new Slot();
        $slot->customer_name = $request->customer_name;
        $slot->title = $request->title;
        $slot->ext = $request->et;
        $slot->token = $request->token;
        $slot->size = $request->size;
        $slot->token = $request->token;
        $slot->url = $request->url;
        $slot->thumbnail_url = $request->thumbnail_url;
        $slot->vehicle_number = $request->vehicle_number;
        $slot->booking_start_date_time = $request->booking_start_date_time;
        $slot->booking_end_date_time = $request->booking_end_date_time;
        foreach($available_slots as $key=>$value) 
        {
            
            $available = Slot::where('booking_start_date_time', $request->booking_start_date_time)
            ->where('slot', $value)->get();
            if(count($available) > 0)
            {
                $slot->slot = $available_slots[$key+1];
                break;
            }
            else{
                $slot->slot = $value;
                break;
            }
            
        }
        
        $seq_number = str_repeat(substr($value,0,1),3);
        $slot_number = $slot->slot;   
        $slot->appointment_number = $slot_number.$seq_number;
        $start_time = Carbon::parse($request->booking_start_date_time);
        $end_time = Carbon::parse($request->booking_end_date_time);
        $total_duration =  $start_time->diff($end_time)->format('%h');
        if($total_duration <= 3) 
        {
            $slot->parking_fee = 10;
        }
        else
        {
            $additional_time = ($total_duration - 3) * 5;
            $slot->parking_fee = $additional_time + 10;
        }
        
        $slot->save();
        return [
            'Appointment Number' => $slot->appointment_number,
            'Slot Number' => $slot->slot,
            'Parking Fee' => $slot->parking_fee
        ];

    }

    public function customerList()
    {
        $customers = DB::table('slots')->select('*')->get();
        $total_collection = DB::table('slots')->sum('parking_fee'); 
        return view('list',compact('customers','total_collection'));
    }
}
