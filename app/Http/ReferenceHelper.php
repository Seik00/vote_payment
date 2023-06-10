<?php

namespace App\Http;

use App\Models\Voucher;
use App\Models\User_voucher;

class ReferenceHelper
{
  public static function getUserVoucherStatus()
  {
    return [
      User_voucher::VOUCHER_ACTIVATED => 'activated',
      User_voucher::VOUCHER_EXPIRED => 'expired',
      User_voucher::VOUCHER_USED => 'used',
      User_voucher::VOUCHER_PENDING => 'pending',
    ];
  }

  public static function getVoucherStatus()
  {
    return [
      Voucher::VOUCHER_ACTIVE => 'active',
      Voucher::VOUCHER_PENDING => 'pending',
      Voucher::VOUCHER_FINISH => 'finish',
      Voucher::VOUCHER_EXPIRED => 'expired',
      Voucher::VOUCHER_REJECTED => 'rejected',
    ];
  }

  public static function getVoucherType()
  {
    return [
      Voucher::TYPE_CASH_VOUCHER => 'cash',
      Voucher::TYPE_DISCOUNT_VOUCHER => 'discount',
      Voucher::TYPE_FREE_VOUCHER => 'free',
    ];
  }
}