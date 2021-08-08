<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Traits\FormatDates;
class MemberTotalPayouts extends Model
{
    use HasFactory,FormatDates;
    protected $guarded=[];
    protected $table="member_total_payouts";
    function getBinaryIncomeAttribute()
    {
        $member=$this->member_id;
        $payout=$this->payout_id;
       $row=DB::table('member_payouts')->select(DB::raw("SUM(amount) as amount"))->where('payout_id',$payout)->where('type',1)->where('member_id',$member)->first();
       if($row->amount)
       {
        return $row->amount;
       }else{
        return 0;
       }
       
    }
    function getSelfRepurchaseAttribute()
    {
        $member=$this->member_id;
        $payout=$this->payout_id;
       $row=DB::table('member_payouts')->select(DB::raw("SUM(amount) as amount"))->where('payout_id',$payout)->where('type',2)->where('member_id',$member)->first();
       if($row->amount)
       {
        return $row->amount;
       }else{
        return 0;
       }
    }
    function getTeamRepurchaseAttribute()
    {
        $member=$this->member_id;
        $payout=$this->payout_id;
       $row=DB::table('member_payouts')->select(DB::raw("SUM(amount) as amount"))->where('payout_id',$payout)->where('type',3)->where('member_id',$member)->first();
       if($row->amount)
       {
        return $row->amount;
       }else{
        return 0;
       }
    }
    public function user()
    {
        return $this->belongsTo(User::class,'member_id');
    }
}
