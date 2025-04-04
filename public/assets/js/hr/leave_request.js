$(document).ready(function (){

const leaveDetailsModal = document.getElementById('leaveDetailsModal');
if (leaveDetailsModal) {
  	leaveDetailsModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const requestId = button.getAttribute('data-bs-whatever');

    $.ajax({
    	url : SITE_URL+'/user/leave/request-details',
    	method : 'post',
    	dataType : 'json',
    	data : {
    		'_token' : $("meta[name=csrf-token]").attr('content'),
    		'requestId' : requestId
    	},
    	success : function (res){
    		if (res.success) {
    			console.log(res.data);
    			// Update the modal's content.
    			const leaveCode = leaveDetailsModal.querySelector('.leave_code');
    			const empCode = leaveDetailsModal.querySelector('.emp_code');
    			const empName = leaveDetailsModal.querySelector('.emp_name');
    			const cc = leaveDetailsModal.querySelector('.cc');
    			const reason = leaveDetailsModal.querySelector('.reason');
    			const absenceDate = leaveDetailsModal.querySelector('.absence_dates');
    			const totalDays = leaveDetailsModal.querySelector('.total_days');
    			const headMail = leaveDetailsModal.querySelector('.head_mail');
    			const revertBy = leaveDetailsModal.querySelector('.revert_by');
    			const revertComment = leaveDetailsModal.querySelector('.revert_comment');
    			const approvedBy = leaveDetailsModal.querySelector('.approved_by');
    			const approvedComment = leaveDetailsModal.querySelector('.approved_comment');
    			const status = leaveDetailsModal.querySelector('.status');
    			const applyDate = leaveDetailsModal.querySelector('.apply_date');
    			const leaveComment = leaveDetailsModal.querySelector('.leave_comment');
    			leaveCode.textContent = res.data.leave_code;
    			empCode.textContent = res.data.emp_code;
    			empName.textContent = res.emp_name;
    			cc.textContent = res.data.cc;
    			reason.textContent = res.data.reason_for_absence;
    			absenceDate.textContent = res.data.absence_dates;
    			totalDays.textContent = res.data.total_days;
    			headMail.textContent = res.data.department_head_email;
    			revertBy.textContent = res.data.revert_by;
    			revertComment.textContent = res.data.approved_disapproved_comment;
    			approvedBy.textContent = res.data.reapproved_by;
    			approvedComment.textContent = res.data.reapproved_redisapproved_comment;
    			status.textContent = res.data.status;
    			applyDate.textContent = new Date(res.data.created_at).toLocaleDateString();
    			leaveComment.innerHTML = res.data.comment;
    		}
    	}
    })
  })
}
})