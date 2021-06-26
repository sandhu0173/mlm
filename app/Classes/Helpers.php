<?php

namespace App\Classes;
use App\Models\User;
use App\Models\Settings;
use App\Models\MemberTree;
use App\Models\Product;
use App\Models\ProductOrders;
use App\Models\PackageOrders;
class Helpers{
    public static $left = 0;
    public static $right=0;
    public static $leftmembers = [];
    public static $rightmembers=[];
    public static $parents=[];
        static function setting($name)
        {
            $setting=Settings::where('name',$name)->first();
            if($setting)
            {
                return $setting->value;
            }else{
                return "";
            }

        }
        static  function generateRandomNumber($length = 10) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            } 
            return $randomString;
        }
        static function user($id)
        {
             $user=User::find($id);
             return $user;
        }
        static function is_admin($id)
        {
             $user=User::find($id)->user_role;
             return $user;
        }
        static function orderDetail($id)
        {
            $detail=PackageOrders::select('package_orders.amount','packages.name')->join('packages','packages.id','=','package_orders.package_id')->where('order_id',$id)->first();
            if($detail==null)
            {
                $detail=ProductOrders::select('product_orders.amount','products.name')->join('products','products.id','=','product_orders.product_id')->where('order_id',$id)->first();
            }
            return $detail;
        }
        static function getLeftMemeber($id)
        {
            $member=self::lmember($id);
            return $member;
        }
        static function getRightMemeber($id)
        {
            $member=self::rmember($id);
            return $member;
        }
        //get left member
        static function lmember($id)
        {
            $member=MemberTree::where('parent_id',$id)->where('side',1)->first();
            if($member)
            {
                self::lmember($member->member_id);
            }else{
                return $id;
            }
        }
        //get right member of user
        static function rmember($id)
        {
            $member=MemberTree::where('parent_id',$id)->where('side',2)->first();
            if($member)
            {
                selef::rmember($member->member_id);
            }else{
                return $id;
            }
        }
        static function directleft($id)
        {
            $user=User::find($id);
            $member=$user->member_id;
            $total=User::where('tracking_id',$member)->where('side',1)->count();
            return $total;
        }
        static function directright($id)
        {
            $user=User::find($id);
            $member=$user->member_id;
            $total=User::where('tracking_id',$member)->where('side',2)->count();
            return $total; 
        }
        //get left member
        static function getleft($id)
        {
            return MemberTree::where('parent_id',$id)->where('side',1)->first();
        }
        //get right member of user
        static function getright($id)
        {
            return MemberTree::where('parent_id',$id)->where('side',2)->first();
        }
        static function countleftmember($id)
        {
            self::$left=0;
            //get first left member
            $member=MemberTree::where('parent_id',$id)->where('side',1)->first();

            //get all members of left side
            if($member)
            {
                self::$left++;
                self::getleftmembers($member->member_id);
            }
            
            return self::$left;
        }
        static function getleftmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                self::$left++;
                self::getleftmembers($member->member_id);
            }
        }
        static function countrightmember($id)
        {
            //get first right member
            self::$right=0;
            $member=MemberTree::where('parent_id',$id)->where('side',2)->first();
            //get all members of left side
            if($member){
                self::$right++;
                self::getrightmembers($member->member_id);
            }
            return self::$right;
        }
        static function getrightmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                self::$right++;
                self::getrightmembers($member->member_id);
            }
           
        }

        //get active member
        static function activecountleftmember($id)
        {
            self::$left=0;
            //get first left member
            $member=MemberTree::where('member_tree.parent_id',$id)->where('side',1)->first();
            
            //get all members of left side
            if($member)
            {
                $user=User::select('status')->where('id',$member->member_id)->first();
              //  if($user->status=='2')
              //  {
                    self::$left++;
              //  }
                self::activegetleftmembers($member->member_id);
            }
            
            return self::$left;
        }
        static function activegetleftmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                $user=User::select('status')->where('id',$member->member_id)->first();
             //   if($user->status=='2')
             //   {
                    self::$left++;
             //   }
                self::activegetleftmembers($member->member_id);
            }
        }
        static function activecountrightmember($id)
        {
            //get first right member
            self::$right=0;
            $member=MemberTree::where('parent_id',$id)->where('side',2)->first();
            //get all members of left side
            if($member){
                $user=User::select('status')->where('id',$member->member_id)->first();
               // if($user->status=='2')
              //  {
                    self::$right++;
              //  }
                self::activegetrightmembers($member->member_id);
            }
            return self::$right;
        }
        static function activegetrightmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                $user=User::select('status')->where('id',$member->member_id)->first();
              //  if($user->status=='2')
               // {
                    self::$right++;
               // }
                self::activegetrightmembers($member->member_id);
            }
        }
        static function leftmemberfirst($id)
        {
            self::$leftmembers=[];
            //get first left member
            $member=MemberTree::where('parent_id',$id)->where('side',1)->first();
            //get all members of left side
            if($member)
            {
                $user=User::select('status')->where('id',$member->member_id)->first();
             //   if($user->status=='2')
             //   {
                    array_push(self::$leftmembers, $member->member_id);
              //  }
                
                self::firstleftmembers($member->member_id);
            }
            return self::$leftmembers;
        }
        static function firstleftmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                $user=User::select('status')->where('id',$member->member_id)->first();
              //  if($user->status=='2')
              //  {
                    array_push(self::$leftmembers, $member->member_id);
              //  }
                self::firstleftmembers($member->member_id);
            }
        }
        static function rightmemberfirst($id)
        {
            //get first right member
            self::$rightmembers=[];
            $member=MemberTree::where('parent_id',$id)->where('side',2)->first();
            //get all members of right side
            if($member){
                $user=User::select('status')->where('id',$member->member_id)->first();
             //   if($user->status=='2')
             //   {
                    array_push(self::$rightmembers,$member->member_id);
             //   }
                
                self::firstrightmembers($member->member_id);
            }
            return self::$rightmembers;
        }
        static function firstrightmembers($id)
        {
            $members=MemberTree::where('parent_id',$id)->get();
            foreach($members as $member)
            {
                $user=User::select('status','user_role')->where('id',$member->member_id)->first();
                if(($user->user_role=='2') && ($user->status=='2'))
                {
                    array_push(self::$rightmembers,$member->member_id);
                }
                self::firstrightmembers($member->member_id);
            }
           
        }
        static function memberparent($id)
        {
            self::$parents=[];
            //get first parent
            $parent=MemberTree::select('parent_id')->where('member_id',$id)->first();
            //get all members of left side
            if($parent)
            {
                $user=User::select('status','user_role')->where('id',$parent->parent_id)->first();
                if(($user->user_role=='2') && ($user->status=='2'))
                {
                    array_push(self::$parents, $parent->parent_id);
                }
              
                self::nextparent($parent->parent_id);
            }
            return self::$parents;
        }
        static function nextparent($id)
        {
            //get first parent
            $parent=MemberTree::select('parent_id')->where('member_id',$id)->first();
            //get all members of left side
            if($parent)
            {
                $user=User::select('status')->where('id',$parent->parent_id)->first();
               // if($user->status=='2')
                if($user->user_role=='2')
                {
                    array_push(self::$parents, $parent->parent_id);
                }
                self::nextparent($parent->parent_id);
            }
        }
        
        static function geturl()
        {
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            // the message
            $msg = "First line of text\nSecond line of text";
            
            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);
            
            // send email
            mail("sandhu0173@gmail.com","My domain",$actual_link);
        }
        
}