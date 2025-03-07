<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Reimbursement extends Model
{
    use HasFactory;

    /**
     * Get the status of the reimbursement.
     */
    public function get_status(): HasMany
    {
        return $this->hasMany(ReimbursementStatus::class, 'rem_id', 'rem_id')->select('verified_by', 'verified_status', 'verified_time');
    }

    /**
     * Get the reimbursement details.
     */
    public function get_details(): HasMany
    {
        return $this->hasMany(ReimbursementDetail::class, 'rem_id', 'rem_id')->select('issue_date', 'description', 'amount', 'invoice_attachment');
    }
}
