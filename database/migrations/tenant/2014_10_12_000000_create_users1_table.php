    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::disableForeignKeyConstraints();

        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email',191)->unique();
                $table->rememberToken();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('gender', ['male', 'female', 'other']);
                $table->bigInteger('phone');
                $table->date('dob');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
                
            });
        }


        //   functional_roles

        if (!Schema::hasTable('functional_roles')) {
            Schema::create('functional_roles', function (Blueprint $table) {
                $table->id();
                $table->string('role');
                $table->integer('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //password_reset_tokens

        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email', 255)->charset('utf8'); // Using utf8 instead of utf8mb4
                $table->primary('email');
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

         //failed_jobs

        if (!Schema::hasTable('failed_jobs')) {
            Schema::create('failed_jobs', function (Blueprint $table) {
                $table->id();
                // $table->string('uuid')->unique();
                $table->string('uuid', 191)->unique();
                $table->text('connection');
                $table->text('queue');
                $table->longText('payload');
                $table->longText('exception');
                $table->timestamp('failed_at')->useCurrent();
            });
        }

        //   //personal_access_tokens

        if (!Schema::hasTable('personal_access_tokens')) {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            });
        }

         //   //personal_access_tokens

         if (!Schema::hasTable('skills')) {
            Schema::create('skills', function (Blueprint $table) {
                $table->id();
                $table->string('skill');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
    
            });
        }

        //   departments

        if (!Schema::hasTable('departments')) {
            Schema::create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('department');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   department_skills

        if (!Schema::hasTable('department_skills')) {
            Schema::create('department_skills', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('department_id')->nullable();
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('NO ACTION');
                $table->unsignedBigInteger('skill_id')->nullable();
                $table->foreign('skill_id')->references('id')->on('skills')->onDelete('NO ACTION');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        

        //   qualifications

        if (!Schema::hasTable('qualifications')) {
            Schema::create('qualifications', function (Blueprint $table) {
                $table->id();
                $table->string('qualification');
                $table->integer('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   banks

        if (!Schema::hasTable('banks')) {
            Schema::create('banks', function (Blueprint $table) {
                $table->id();
                $table->string('type_of_bank');
                $table->string('name_of_bank');
                $table->integer('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

         //   organizations

         if (!Schema::hasTable('organizations')) {
            Schema::create('organizations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('address');
                $table->bigInteger('contact')->nullable();
                $table->string('email');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   designations

        if (!Schema::hasTable('designations')) {
            Schema::create('designations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   menus

        if (!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->string('mid')->nullable();
                $table->string('section')->nullable();
                $table->string('section_icon')->nullable();
                $table->string('name')->nullable();
                $table->string('page')->nullable();
               
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

         //   roles

         if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('rid')->nullable();
                $table->string('role_name')->nullable();
                $table->string('menu_id')->nullable();
                // $table->foreign('menu_id')->references('id')->on('menus')->onDelete('NO ACTION');
                
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   companies

        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->bigInteger('mobile');
                $table->string('email');
                $table->string('address');
                $table->string('registration_no');
                $table->string('gstin_no');
                $table->string('sac_code');
                $table->string('service_tax_registration_no');
                $table->string('pan_no');
                $table->string('website');
                $table->string('bank_payee_name');
                $table->string('bank_name');
                $table->bigInteger('account_no');
                $table->string('ifsc_code');
                $table->string('branch_name');
                $table->string('branch_address');
                $table->string('company_city');
                $table->string('payment_type');
                $table->string('bank_email');
                $table->string('twitter_link');
                $table->string('facebook_link');
                $table->string('youtube_link');
                $table->string('instagram_link');
                $table->string('pinterest_link');
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

    

         //   update user roles
         if(!Schema::hasColumn('users', 'role_id','department_id','company_id')){
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger(column: 'role_id')->after('dob')->nullable();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('NO ACTION');
                $table->unsignedBigInteger('department_id')->after('role_id')->nullable();
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('NO ACTION');
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('NO ACTION');
            });
         }

            //   holidays

            if (!Schema::hasTable('holidays')) {
                Schema::create('holidays', function (Blueprint $table) {
                    $table->id();
                    $table->string('holiday_name');
                    $table->string('holiday_date');
                    $table->enum('holiday_type', ['Gazetted Holiday','National Holiday','Not Specify']);
                    $table->enum('location', ['delhi'])->default('delhi');
                    $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                    $table->integer('created_by')->nullable();
                    $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('updated_by')->nullable();
                    $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('deleted_by')->nullable();
                    $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->softDeletes();
                    $table->timestamps();
                });
            }

              //   projects

                if (!Schema::hasTable('projects')) {
                    Schema::create('projects', function (Blueprint $table) {
                        $table->id();
                        $table->unsignedBigInteger('organisation_id')->nullable();
                        $table->foreign('organisation_id')->references('id')->on('organizations')->onDelete('NO ACTION');
                        $table->string('project_number')->unique();
                        $table->string('project_name');
                        $table->string('empanelment_reference')->nullable();
                        
                        $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                        $table->integer('created_by')->nullable();
                        $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                        $table->integer('updated_by')->nullable();
                        $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                        $table->integer('deleted_by')->nullable();
                        $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                        $table->softDeletes();
                        $table->timestamps();
                    });
                }
            //   work_orders

            if (!Schema::hasTable('work_orders')) {
                Schema::create('work_orders', function (Blueprint $table) {
                    $table->id();
                    $table->string('wo_internal_ref_no')->nullable();
                    $table->unsignedBigInteger('project_id')->nullable();
                    $table->foreign('project_id')->references('id')->on('projects')->onDelete('NO ACTION');
        
                    $table->string('wo_number')->unique();
                    $table->string('prev_wo_no')->nullable();
                    $table->date('wo_date_of_issue')->nullable();
                    // $table->string('wo_project_number')->nullable();
                    // $table->string('wo_project_name')->nullable();
                    $table->string('wo_concern_ministry')->nullable();
                    // $table->string('wo_empanelment_reference')->nullable();
                    $table->string('wo_no_of_resources')->nullable();
                    $table->string('wo_project_duration')->nullable();
                    $table->string('wo_project_duration_day')->nullable();
                    $table->date('wo_start_date')->nullable();
                    $table->date('wo_end_date')->nullable();
                    $table->string('wo_location')->nullable();
                    $table->string('wo_city')->nullable();
                    $table->integer('wo_amount')->nullable();
                    $table->string('wo_project_coordinator')->nullable();
        
                    $table->string('wo_invoice_name')->nullable();
        
                    $table->string('wo_invoice_address')->nullable();
                    $table->string('wo_state')->nullable();
                    $table->string('wo_pin')->nullable();
                    $table->string('wo_remarks')->nullable();
                    $table->string('wo_status')->nullable();;
                    $table->date('wo_created_date')->nullable();;
                    $table->string('wo_entry_by')->nullable();;
                    $table->string('wo_attached_file')->nullable();
        
                    $table->string('amendment_number')->nullable();
                    $table->string('amendment_date')->nullable();
                    $table->string('previous_order_no')->nullable();
                    $table->string('billing_structure')->nullable();
        
                    $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                    $table->integer('created_by')->nullable();
                    $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('updated_by')->nullable();
                    $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('deleted_by')->nullable();
                    $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->softDeletes();
                    $table->timestamps();
                });
            }
            
            //   wo_contact_details

            if (!Schema::hasTable('wo_contact_details')) {
                Schema::create('wo_contact_details', function (Blueprint $table) {
                    $table->id();            
                    $table->unsignedBigInteger('work_order_id')->nullable();
                    $table->foreign('work_order_id')->references('id')->on('work_orders')->onDelete('NO ACTION');
                    $table->string('wo_client_contact_person')->nullable();;
                    $table->string('wo_client_designation')->nullable();;
                    $table->string('wo_client_contact')->nullable();;
                    $table->string('wo_client_email')->nullable();;
                    $table->string('wo_client_remarks')->nullable();;
        
                    $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                    $table->integer('created_by')->nullable();
                    $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('updated_by')->nullable();
                    $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('deleted_by')->nullable();
                    $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->softDeletes();
                    $table->timestamps();
                });
            }

            //   email_history

            if (!Schema::hasTable('email_history')) {
                Schema::create('email_history', function (Blueprint $table) {
                    $table->id();
                    $table->string('from_mail');
                    $table->string('to_mail');
                    $table->string('sender_id')->nullable();
                    $table->string('cc')->nullable();
                    $table->string('subject');
                    $table->text('content');
                    $table->string('attatchment')->nullable();
                    $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
        
                    $table->integer('created_by')->nullable();
                    $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('updated_by')->nullable();
                    $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->integer('deleted_by')->nullable();
                    $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                    $table->softDeletes();
                    $table->timestamps();
                });
            }

            //   emp_salary_slip

    if (!Schema::hasTable('emp_salary_slip')) {
            Schema::create('emp_salary_slip', function (Blueprint $table) {
                $table->id('emp_salary_id');
                $table->string('work_order')->nullable();
                $table->string('sal_emp_code')->nullable();
                $table->string('wo_attendance_at_emp')->nullable();
                $table->string('sal_emp_name')->nullable();
                $table->string('sal_emp_email')->nullable();
                $table->string('sal_month')->nullable();
                $table->string('sal_pf_number')->nullable();
                $table->string('sal_working_days')->nullable();
                $table->string('sal_esi_number')->nullable();
                $table->string('sal_aadhar_no')->nullable();
                $table->string('sal_pan_no')->nullable();
                $table->string('sal_bank_name')->nullable();
                $table->string('sal_designation')->nullable();
                $table->string('sal_account_no')->nullable();
                $table->string('sal_uan_no')->nullable();
                $table->string('emp_sal_ctc')->nullable();
                $table->string('sal_basic')->nullable();
                $table->string('sal_hra')->nullable();
                $table->string('sal_conveyance')->nullable();
                $table->string('sal_medical_allowance')->nullable();
                $table->string('sal_special_allowance')->nullable();
                $table->string('sal_gross')->nullable();
                $table->string('sal_net')->nullable();
                $table->string('sal_pf_employee')->nullable();
                $table->string('sal_esi_employee')->nullable();
                $table->string('sal_recovery')->nullable();
                $table->string('sal_pf_wages')->nullable();
                $table->string('sal_esi_wages')->nullable();
                $table->string('sal_advance')->nullable();
                $table->string('sal_medical_insurance')->nullable();
                $table->string('sal_accident_insurance')->nullable();
                $table->string('tds_deduction')->nullable();
                $table->string('sal_tax')->nullable();
                $table->string('sal_medical_insurance_ctc')->nullable();
                $table->string('sal_accident_insurance_ctc')->nullable();
                $table->string('sal_group_medical')->nullable();
                $table->string('sal_total_deduction')->nullable();
                $table->string('sal_doj')->nullable();
                $table->string('total_overtime_allowance')->nullable();
                $table->string('sal_remarks')->nullable();
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->string('user_id')->nullable();
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->dateTime('time')->useCurrent();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
            }

            if (!Schema::hasColumn('users', 'role_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->unsignedBigInteger(column: 'role_id')->after('dob')->nullable();
                    $table->foreign('role_id')->references('id')->on('roles')->onDelete('NO ACTION');
                    $table->unsignedBigInteger('department_id')->after('role_id')->nullable();
                    $table->foreign('department_id')->references('id')->on('departments')->onDelete('NO ACTION');
                    $table->unsignedBigInteger('company_id')->nullable();
                    $table->foreign('company_id')->references('id')->on('companies')->onDelete('NO ACTION');
                });
            }

            // add_linkedin_link_to_companies_table

            if (!Schema::hasColumn('companies', 'linkedin_link')) {
                Schema::table('companies', function (Blueprint $table) {
                    $table->string('linkedin_link')->after('facebook_link')->nullable();
                    $table->integer('user_id')->nullable();
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
                });
            }

        //   leave_request

            if (!Schema::hasTable('leave_request')) {
            Schema::create('leave_request', function (Blueprint $table) {
               $table->id();
               $table->string('leave_code');
               $table->string('emp_code');
               $table->string('cc');
               $table->string('department_head_email');
               $table->string('reason_for_absence');
               $table->string('absence_dates');
               $table->string('absence_start_date');
               $table->string('absence_end_date');
               $table->string('total_days');
               $table->string('comment');
               $table->enum('status', ['Wait','Approved','Disapproved','Reapproved','Redisapproved','Modified'])->default('Wait');
               $table->string('approved_disapproved_by');
               $table->string('approved_disapproved_comment');
               $table->string('reapproved_redisapproved_by');
               $table->string('reapproved_redisapproved_comment');
               $table->dateTime('created_on')->useCurrent();
               $table->dateTime('updated_on')->useCurrentOnUpdate();
               $table->dateTime('deleted_on');
           });
        }
  
        //   leave_regularizations

        if (!Schema::hasTable('leave_regularizations')) {
        Schema::create('leave_regularizations', function (Blueprint $table) {
            $table->id();
            $table->string('wo_number');
            $table->string('at_emp');
            $table->integer('emp_id');
            $table->string('emp_code');
            $table->string('leave_month');
            $table->text('leave_dates');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   wo_attendances

    if (!Schema::hasTable('wo_attendances')) {
        Schema::create('wo_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('wo_number')->nullable();
            $table->string('at_emp');
            $table->integer('emp_id')->nullable();
            $table->string('emp_code')->nullable();
            $table->string('attendance_month')->nullable();
            $table->string('approve_leave')->nullable();
            $table->string('lwp_leave')->nullable();
            $table->string('recovery')->nullable();
            $table->string('advance')->nullable();
            $table->string('overtime_rate')->nullable();
            $table->string('total_working_hrs')->nullable();
            $table->string('emp_vendor_rate')->nullable();
            $table->string('designation')->nullable();
            $table->string('ctc')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('attendance_status',['completed', 'pending']);
            $table->integer('user_id')->nullable();
            $table->enum('source', ['normal upload', 'bulk upload'])->default('normal upload');

            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

     //   emp_wish_mail_logs

     if (!Schema::hasTable('emp_wish_mail_logs')) {
        Schema::create('emp_wish_mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->string('emp_name');
            $table->string('emp_email');
            $table->date('emp_dob')->nullable();
            $table->date('emp_dom')->nullable();
            $table->date('emp_doj')->nullable();
            $table->text('message')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('wish_type', ['Birthday','Marriage','Joining'])->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   emp_changed_columns_reqs

    if (!Schema::hasTable('emp_changed_columns_reqs')) {
        Schema::create('emp_changed_columns_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_description')->nullable();
            $table->enum('status', ['active','deactive'])->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   emp_profile_request_logs

    if (!Schema::hasTable('emp_profile_request_logs')) {
        Schema::create('emp_profile_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->nullable();
            $table->string('emp_code');
            $table->string('description');
            $table->string('file')->nullable();  
            $table->unsignedBigInteger('changed_column');
            $table->foreign('changed_column')->references('id')->on('emp_changed_columns_reqs');
            $table->string('assigned_to')->nullable();
            $table->enum('status', ['open','completed','dropped'])->nullable();  
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   salary

    if (!Schema::hasTable('salary')) {
        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->integer('sl_emp_id');
            $table->string('sl_emp_code')->nullable();
            $table->date('sa_emp_doj')->nullable();
            $table->string('sal_emp_name')->nullable();
            $table->string('sal_emp_designation')->nullable();
            $table->integer('sal_ctc')->nullable();
            $table->integer('sal_gross')->nullable();
            $table->integer('taxable_salary')->nullable();
            $table->integer('tds_tax_amount')->nullable();
            $table->integer('tax_credit')->nullable();
            $table->integer('e_cess')->nullable();
            $table->integer('sal_net')->nullable();
            $table->integer('sal_basic')->nullable();
            
            $table->string('sal_hra')->nullable();
            $table->integer('sal_da')->nullable();
            $table->string('sal_conveyance')->nullable();
            $table->integer('medical_allowance')->nullable();
            $table->string('sal_telephone')->nullable();

            $table->integer('sal_uniform')->nullable();
            $table->integer('sal_school_fee')->nullable();
            $table->integer('sal_car_allow')->nullable();
            $table->integer('sal_grade_pay')->nullable();
            $table->integer('sal_special_allowance')->nullable();

            $table->string('sal_pf_employer')->nullable();
            $table->string('sal_pf_employee')->nullable();

            $table->enum('pf_exception',['yes','no'])->default('no');
            $table->enum('esi_exception',['yes','no'])->default('no');

            $table->string('sal_esi_employer')->nullable();
            $table->string('sal_esi_employee')->nullable();

            $table->integer('sal_lwf_employee')->nullable();
            $table->integer('sal_lwf_employer')->nullable();
            $table->integer('medical_insurance')->nullable();
            $table->integer('accident_insurance')->nullable();

            $table->integer('medical_insurance_ctc')->default(0);
            $table->integer('accident_insurance_ctc')->default(0);
            
            $table->integer('tds_deduction')->nullable();
            $table->integer('pf_wages')->nullable();
            $table->integer('sal_tax')->nullable();
            $table->integer('sal_remark')->nullable();
            $table->integer('sal_add_date')->nullable();
            $table->integer('sal_entry_by')->nullable();
           
            $table->enum('source', ['normal upload', 'bulk upload'])->default('normal upload');

            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

     //   user_request_logs

     if (!Schema::hasTable('user_request_logs')) {
        Schema::create('user_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
            $table->string('query_type')->nullable();
            $table->string('description')->nullable();
            $table->string('job_position')->nullable();
            $table->enum('status', ['open','completed','dropped'])->nullable();  
            $table->string('ref_table_name')->nullable();
            $table->string('ref_table_id')->nullable();
            $table->string('status_changed_to')->nullable();
            $table->string('change_offer_letter')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    // country
    if (!Schema::hasTable('countries')) {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('sortname');
            $table->string('name');
            $table->integer('phonecode');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   states

    if (!Schema::hasTable('states')) {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('state');
            $table->string('state_code');
            $table->string('slug');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }
//   cities

if (!Schema::hasTable('cities')) {
    Schema::create('cities', function (Blueprint $table) {
        $table->id();
        $table->string('city_name');
        $table->integer('city_code')->nullable();
        $table->unsignedBigInteger('state_code');
        $table->foreign('state_code')->references('id')->on('states');
        $table->integer('created_by')->nullable();
        $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
        $table->integer('updated_by')->nullable();
        $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
        $table->integer('deleted_by')->nullable();
        $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
        $table->softDeletes();
        $table->timestamps();
    });
}
   //   position_requests

    if (!Schema::hasTable('position_requests')) {
        Schema::create('position_requests', function (Blueprint $table) {
            $table->id();
            $table->string('req_id');
            $table->string('unique_id')->nullable();
            $table->string('recruitment_type')->nullable();
            $table->enum('employment_type', ['Permenant','Contractual']);
            $table->string('position_title')->nullable();
            $table->string('client_name')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')->references('id')->on('departments');
            $table->string('functional_role')->nullable();
            $table->string('position_duration')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states');
            $table->unsignedBigInteger('city')->nullable();
            $table->foreign('city')->references('id')->on('cities');
            $table->date('date_notified')->nullable();
            $table->integer('no_of_requirements');
            $table->integer('no_of_completed_requirements')->default(0);
            $table->string('jd_permission')->default('1');
            $table->string('requirement_status')->nullable();
            $table->longText('job_description')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('skill_sets')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status')->default(1);
            $table->string('position_type')->nullable();
            $table->string('employee_type')->nullable();
            $table->integer('hiring_budget')->nullable();
            $table->string('budget_status')->nullable();
            $table->string('assigned_executive')->nullable();
            $table->string('read_status')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   send_mail_log

    if (!Schema::hasTable('send_mail_log')) {
        Schema::create('send_mail_log', function (Blueprint $table) {
            $table->id();
            $table->text('uni_id');
            $table->string('receiver_name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->unsignedBigInteger('job_position');
            $table->foreign('job_position')->references('id')->on('position_requests')->onDelete('NO ACTION');
            $table->string('department')->nullable();
            $table->string('sender_email');
            $table->longText('message')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }
 //   districts

    if (!Schema::hasTable('districts')) {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('district_name');
            $table->string('slug');
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //   recruitment_forms

    if (!Schema::hasTable('recruitment_forms')) {
        Schema::create('recruitment_forms', function (Blueprint $table) {
            $table->id();
            $table->string('send_mail_id')->nullable();
            $table->unsignedBigInteger('pos_req_id')->nullable();
            $table->foreign('pos_req_id')->references('id')->on('position_requests');
            $table->string('department');
            $table->string('recruitment_type');
            $table->enum('employment_type', ['Permenant','Contractual'])->default('Permenant');
            $table->enum('gender', ['Male','Female','Other'])->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relation')->nullable();
            $table->unsignedBigInteger('district')->nullable();
            $table->foreign('district')->references('id')->on('districts');
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states');
            $table->string('pincode')->nullable();
            $table->mediumText('scope_of_work')->nullable();
            $table->text('candidate_address')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job_position');
            $table->date('dob')->nullable();
            $table->string('location');
            $table->string('education');
            $table->string('experience');
            $table->string('skill');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('resume')->nullable();
            $table->string('status')->default('applied');
            $table->string('stage1')->nullable();
            $table->string('stage2')->nullable();
            $table->string('stage3')->nullable();
            $table->string('stage4')->nullable();
            $table->string('stage5')->nullable();
            $table->string('stage6')->nullable();
            $table->enum('finally', ['first-selected','send_interview_details','second-selected','third-selected','fourth-selected','offer-letter-sent','offer_accepted','backout','docs_checked','joining-formalities-completed','joined','first-skipped','second-skipped','third-skipped','finally-skipped','first-rejected','second-rejected','third-rejected','finally-rejected'])->nullable();
            $table->string('reference')->nullable();
            $table->string('reference_name')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('fixed')->nullable();
            $table->integer('variable')->nullable();
            $table->string('emp_code')->nullable();
            $table->string('others')->nullable();
            $table->integer('read_status')->nullable();
            $table->string('remarks_first_round')->nullable();
            $table->string('remarks_second_round')->nullable();
            $table->string('remarks_for_backout')->nullable();
            $table->text('offer_letter')->nullable();
            $table->date('doj')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('rec_form_status')->nullable();
            $table->enum('recruitment_status', ['0','1'])->default('0')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

     //   rec_personal_details

     if (!Schema::hasTable('rec_personal_details')) {
        Schema::create('rec_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('emp_code')->nullable();
            $table->enum('gender', ['male','female','others'])->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_mobile')->nullable();
            $table->enum('marital_status', ['married','unmarried'])->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('date_of_marriage')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('pf_no')->nullable();
            $table->string('photograph')->nullable();
            $table->string('signature')->nullable();
            $table->string('language_known')->nullable();
            $table->string('aadhar_card_no')->nullable();
            $table->string('aadhar_card_doc')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_doc')->nullable();
            $table->enum('category', ['general','obc','sc','st'])->nullable();
            $table->string('category_doc')->nullable();
            $table->string('police_verification_id')->nullable();
            $table->string('police_verification_doc')->nullable();
            $table->string('nearest_police_station')->nullable();
            $table->enum('status', ['active','deactive'])->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

     //   rec_address_details

     if (!Schema::hasTable('rec_address_details')) {
        Schema::create('rec_address_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->text('permanent_add')->nullable();
            $table->string('per_doc_type')->nullable();
            $table->string('permanent_add_doc')->nullable();
            $table->text('correspondence_add')->nullable();
            $table->string('corres_doc_type')->nullable();
            $table->string('correspondence_add_doc')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });

     }

       //   rec_bank_details

       if (!Schema::hasTable('rec_bank_details')) {
        Schema::create('rec_bank_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->unsignedBigInteger('bank_name_id')->nullable();
            $table->foreign('bank_name_id')->references('id')->on('banks');
            $table->string('account_no')->nullable();
            $table->string('branch')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_doc')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->string('pan_card_doc')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });

       }

        //   rec_educational_details

        if (!Schema::hasTable('rec_educational_details')) {
            Schema::create('rec_educational_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('rec_id')->nullable();
                $table->foreign('rec_id')->references('id')->on('recruitment_forms');
                $table->string('10th_percentage')->nullable();
                $table->string('10th_year')->nullable();
                $table->string('10th_board')->nullable();
                $table->string('10th_doc')->nullable();
                $table->string('12th_percentage')->nullable();
                $table->string('12th_year')->nullable();
                $table->string('12th_board')->nullable();
                $table->string('12th_doc')->nullable();
                $table->string('grad_name')->nullable();
                $table->string('grad_percentage')->nullable();
                $table->string('grad_year')->nullable();
                $table->string('grad_mode')->nullable();
                $table->string('grad_doc')->nullable();
                $table->string('post_grad_name')->nullable();
                $table->string('post_grad_percentage')->nullable();
                $table->string('post_grad_year')->nullable();
                $table->string('post_grad_mode')->nullable();
                $table->string('post_grad_doc')->nullable();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
    
        }

        //   rec_esi_details

        if (!Schema::hasTable('rec_esi_details')) {
            Schema::create('rec_esi_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('rec_id')->nullable();
                $table->foreign('rec_id')->references('id')->on('recruitment_forms');
                $table->string('previous_esi_no')->nullable();
                $table->enum('status', ['active','inactive'])->default('active');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   rec_previous_companies

        if (!Schema::hasTable('rec_previous_companies')) {
            Schema::create('rec_previous_companies', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('rec_id')->nullable();
                $table->foreign('rec_id')->references('id')->on('recruitment_forms');
                $table->string('company_name')->nullable();
                $table->string('technologies_worked_in')->nullable();
                $table->string('projects_worked_in')->nullable();
                $table->string('designation')->nullable();
                $table->string('salary_ctc')->nullable();
                $table->string('take_home_salary')->nullable();
                $table->string('last_3months_sal_slip_doc')->nullable();
                $table->string('3months_bank_stat_doc')->nullable();
                $table->string('doc_type')->nullable();
                $table->string('doc_file')->nullable();
                $table->string('start_date')->nullable();
                $table->string('end_date')->nullable();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   rec_nominee_details

        if (!Schema::hasTable('rec_nominee_details')) {
            Schema::create('rec_nominee_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('rec_id')->nullable();
                $table->foreign('rec_id')->references('id')->on('recruitment_forms');
                $table->string('family_member_name')->nullable();
                $table->string('relation_with_mem')->nullable();
                $table->string('aadhar_card_no')->nullable();
                $table->string('aadhar_card_doc')->nullable();
                $table->date('dob')->nullable();
                $table->enum('stay_with_mem', ['yes', 'no'])->nullable();
                $table->string('dispensary_near_you')->nullable();
                $table->string('nominee')->nullable();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

         //   notifications

         if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('description');
                $table->string('send_by');
                $table->string('received_to');
                $table->string('user_type')->nullable();
                $table->string('notification_type')->nullable();
                $table->string('reference_table_name')->nullable();
                $table->string('reference_table_id')->nullable();
                $table->enum('read_status', ['0','1'])->default('0');
                $table->string('read_time')->nullable();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //   invoice_records

        if (!Schema::hasTable('invoice_records')) {
            Schema::create('invoice_records', function (Blueprint $table) {
                $table->id();
                $table->string('ir_invoice_number');
                $table->string('ir_wo');
                $table->string('ir_month');
                $table->string('ir_sub_total')->nullable();
                $table->string('ir_gst_mode')->nullable()->comment('if igst then 18 % and if cgst and sgst then 18 is 9 + 9');;
                $table->string('gst_rate')->nullable();
                $table->string('gst_value')->nullable();
                $table->enum('show_service_charge', ['yes', 'no'])->default('no');
                $table->string('service_charge_rate')->nullable()->comment('if show service charge on invoice');
                $table->string('service_charge_value')->nullable();
                $table->string('ir_grand_total')->nullable();
                $table->string('ir_add_datetime')->nullable();
                $table->string('user_id')->nullable();
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

         // contacted_by_call_logs

        if (!Schema::hasTable('contacted_by_call_logs')) {
            Schema::create('contacted_by_call_logs', function (Blueprint $table) {
                $table->id();
                $table->string('job_position');
                $table->string('client_name');
                $table->string('name');
                $table->string('email');
                $table->string('phone_no');
                $table->string('experience')->nullable();
                $table->string('curr_ctc')->nullable();
                $table->string('exp_ctc')->nullable();
                $table->string('notice_period')->nullable();
                $table->string('qualification')->nullable();
                $table->string('location')->nullable();
                $table->string('resume')->nullable();
                $table->string('rec_email')->nullable();
                $table->string('rec_type')->nullable();
                $table->string('remarks')->nullable();
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }
        
        // wo_billing_structure

        if (!Schema::hasTable('wo_billing_structure')) {
            Schema::create('wo_billing_structure', function (Blueprint $table) {
                $table->id();
            $table->unsignedBigInteger('organisation_id');
                $table->foreign('organisation_id')->references('id')->on('organizations');
                $table->string('wo_number')->nullable();
                $table->string('billing_to')->nullable();
                $table->text('billing_address')->nullable();
                $table->string('contact_person')->nullable();
                $table->string('email_id')->nullable();
                $table->string('billing_sac_code')->nullable();
                $table->string('billing_gst_no')->nullable();
                $table->string('billing_tax_mode')->nullable();
                $table->enum('show_service_charge', ['yes','no'])->nullable();
                $table->string('service_charge_rate')->nullable();
                $table->string('billing_state')->nullable();
                $table->string('billing_tax_rate')->nullable();

                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //form16

        if (!Schema::hasTable('form16')) {
            Schema::create('form16', function (Blueprint $table) {
                $table->id();
                $table->integer('emp_id');
                $table->string('pan_no')->nullable();
                $table->string('financial_year')->nullable();
                $table->string('attachment')->nullable();
                $table->enum('source',['bulk_upload','normal_upload'])->default('normal_upload');
            
                $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //reimbursements

        if (!Schema::hasTable('reimbursements')) {
            Schema::create('reimbursements', function (Blueprint $table) {
                $table->id();
                $table->string('rem_id')->unique();
                $table->string('emp_id');
                $table->string('designation');
                $table->string('department');
                $table->string('date')->nullable();
                $table->string('name');
                $table->string('total_amount')->nullable();
                $table->string('advance_amount')->nullable();
                $table->enum('final_submit', ['yes','no'])->default('no');
                $table->string('remarks')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

           //reimbursements status

           if (!Schema::hasTable('reimbursement_status')) {
            Schema::create('reimbursement_status', function (Blueprint $table) {
                $table->id();
                $table->string('rem_id');
                $table->foreign('rem_id')->references('rem_id')->on('reimbursements');
                $table->string('emp_id')->nullable();
                $table->enum('verified_by', ['1','2','3'])->nullable();
                $table->enum('verified_status', ['approved','disapproved','pending'])->nullable();
                $table->string('verified_time')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }


         //reimbursements details

         if (!Schema::hasTable('reimbursement_details')) {
            Schema::create('reimbursement_details', function (Blueprint $table) {
                $table->id();
                $table->string('rem_id');
                $table->foreign('rem_id')->references('rem_id')->on('reimbursements');
                $table->string('emp_id')->nullable();
                $table->string('issue_date')->nullable();
                $table->text('description')->nullable();
                $table->string('amount')->nullable();
                $table->string('invoice_attachment')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        //reimbursements details

        if (!Schema::hasTable('reimbursement_details')) {
            Schema::create('reimbursement_details', function (Blueprint $table) {
                $table->id();
                $table->string('rem_id');
                $table->foreign('rem_id')->references('rem_id')->on('reimbursements');
                $table->string('emp_id')->nullable();
                $table->string('issue_date')->nullable();
                $table->text('description')->nullable();
                $table->string('amount')->nullable();
                $table->string('invoice_attachment')->nullable();
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        // add parent id to menus

        if (!Schema::hasColumn('menus','parent_id')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->bigInteger('parent_id');
            });
            
        }

        // appointment_format
        if (!Schema::hasTable('appointment_format')) {
            Schema::create('appointment_format', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->longText('format')->nullable();
                $table->mediumText('format_2')->nullable();
                $table->string('type');
                $table->enum('employment_type', ['Permenant','Contractual'])->nullable();
                $table->integer('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }

         // appointment_format
         if (!Schema::hasTable('emp_send_doc')) {
            Schema::create('emp_send_doc', function (Blueprint $table) {
                $table->id();
                $table->string('emp_code')->nullable();
                $table->string('doc_type')->nullable();
                $table->longText('document')->nullable();
                $table->integer('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->integer('deleted_by')->nullable();
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
                $table->softDeletes();
                $table->timestamps();
            });
        }


        Schema::enableForeignKeyConstraints();
        
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('department_skills');
        Schema::dropIfExists('functional_roles');
        Schema::dropIfExists('qualifications');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('designations');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('holidays');
        Schema::dropIfExists('work_orders');
        Schema::dropIfExists('wo_contact_details');
        Schema::dropIfExists('email_history');
        Schema::dropIfExists('emp_salary_slip');
        Schema::dropIfExists('leave_request');
        Schema::dropIfExists('leave_regularizations');
        Schema::dropIfExists('wo_attendances');
        Schema::dropIfExists('emp_wish_mail_logs');
        Schema::dropIfExists('emp_changed_columns_reqs');
        Schema::dropIfExists('emp_profile_request_logs');
        Schema::dropIfExists('salary');
        Schema::dropIfExists('user_request_logs');
        Schema::dropIfExists('position_requests');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('send_mail_log');
        Schema::dropIfExists('recruitment_forms');
        Schema::dropIfExists('rec_personal_details');
        Schema::dropIfExists('rec_address_details');
        Schema::dropIfExists('rec_bank_details');
        Schema::dropIfExists('rec_educational_details');
        Schema::dropIfExists('rec_esi_details');
        Schema::dropIfExists('rec_previous_companies');
        Schema::dropIfExists('rec_nominee_details');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('invoice_records');
        Schema::dropIfExists('contacted_by_call_logs');
        Schema::dropIfExists('wo_billing_structure');
        Schema::dropIfExists('form16');
        Schema::dropIfExists('reimbursements');
        Schema::dropIfExists('reimbursement_status');
        Schema::dropIfExists('reimbursement_details');
        Schema::dropIfExists('appointment_format');
        Schema::dropIfExists('emp_send_doc');
        Schema::enableForeignKeyConstraints();
    }
};
