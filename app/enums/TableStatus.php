<?php

namespace App\Enums;

enum TableStatus: string
{
  case Available = "available";
  case Pending = "pending";
  case Booked = "booked";
}