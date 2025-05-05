$(document).ready(function () {

    // Add More Attachment
    $(".add-more-client").click(function(){
        let newRow = `
            <div class="row g-3 attachment-remove">
                <div class="col-lg-4 col-md-4">
                    <label class="form-label text-dark">Attachment Type</label>
                    <select class="form-select">
                        <option value="">Not Specify</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-4">
                    <label for="formFile" class="form-label text-dark">Attachment File</label>
                    <input class="form-control" type="file">
                </div>

                <div class="col-lg-4 col-md-4">
                    <label class="form-label text-dark">Action</label>
                    <button type="button" class="btn btn-sm btn-danger remove-client">Remove</button>
                </div>
            </div>
        `;

        $('.append_add-more-items').append(newRow);
    });

    // Remove Attachment
    $(document).on('click', '.remove-client', function () {
        $(this).closest('.attachment-remove').remove();
    });


    // SPOC ROW Add more button



    $("#add-more-spoc").click(function(){
        let SPOCRow = `
             <div class="row g-3 fadeup-spoc">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Name</label>
                                <input type="text" class="form-control form-control-sm " name="Name"
                                    placeholder="Enter Name">

                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Email</label>
                                <input type="text" class="form-control form-control-sm " name="email"
                                    placeholder="Enter Email">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Contact</label>
                                <input type="text" class="form-control form-control-sm " name="Contact"
                                    placeholder="Enter Contact">
                            </div>

                            <div class="col-lg-6 col-md-6 mt-3">
                                <label class="form-label" class="text-dark">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-3">
                                <label class="form-label" class="text-dark">Set As Default</label>
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck" />
                            </div>
                            <div class="col-lg-4 col-md-4 mt-3">
                                <label class="form-label" class="text-dark">Action</label>

                                <button type="button" class="btn btn-sm btn-danger remove-spoc" id="">Remove SPOC</button>
                            </div>
        `;

        $('.append_add-more-spoc').append(SPOCRow );
    });

    // Remove Attachment
    $(document).on('click', '.remove-spoc', function () {
        $(this).closest('.fadeup-spoc').remove();
    });




    // Auto suggestion for Client Name

    const data = [
        "Apple", "Apricot", "Avocado", "Banana", "Blackberry", "Blueberry",
        "Boysenberry", "Cantaloupe", "Cherry", "Coconut", "Cranberry",
        "Cucumber", "Date", "Dragonfruit", "Durian", "Elderberry", "Fig",
        "Gooseberry", "Grape", "Grapefruit", "Guava", "Honeydew", "Jackfruit",
        "Kiwi", "Kumquat", "Lemon", "Lime", "Lychee", "Mango", "Melon",
        "Mulberry", "Nectarine", "Olive", "Orange", "Papaya", "Passionfruit",
        "Peach", "Pear", "Pineapple", "Plum", "Pomegranate", "Quince",
        "Raspberry", "Strawberry", "Tangerine", "Watermelon"
      ];

      $('.search').on('input', function () {
        const inputVal = $(this).val().toLowerCase();
        const filtered = data.filter(item =>item.toLowerCase().includes(inputVal));
        
  
        if (inputVal && filtered.length) {
          $('.suggestions').empty().show();
          filtered.forEach(item => {
            $('.suggestions').append(`<div class="suggestion-item" id="suggestion-item-design">${item}</div>`);
          });
        } else {
          $('.suggestions').hide();
        }
      });
  
      $(document).on('click', '.suggestion-item', function () {
        $('.search').val($(this).text());
        $('.suggestions').hide();
      });
  
      $(document).click(function (e) {
        if (!$(e.target).closest('.search, .suggestions').length) {
          $('.suggestions').hide();
    }
});




// Department Name


const departmentdata = [
    "Apple", "Apricot", "Avocado", "Banana", "Blackberry", "Blueberry",
    "Boysenberry", "Cantaloupe", "Cherry", "Coconut", "Cranberry",
    "Cucumber", "Date", "Dragonfruit", "Durian", "Elderberry", "Fig",
    "Gooseberry", "Grape", "Grapefruit", "Guava", "Honeydew", "Jackfruit",
    "Kiwi", "Kumquat", "Lemon", "Lime", "Lychee", "Mango", "Melon",
    "Mulberry", "Nectarine", "Olive", "Orange", "Papaya", "Passionfruit",
    "Peach", "Pear", "Pineapple", "Plum", "Pomegranate", "Quince",
    "Raspberry", "Strawberry", "Tangerine", "Watermelon"
  ];

  $('.department-search').on('input',function(){
    const departmentval=$(this).val().toLowerCase();
    const departmentFiltered=departmentdata.filter(item=>item.toLowerCase().includes(departmentval))
    console.log(departmentFiltered.length)

    if(departmentval&&departmentFiltered.length){
        $('.department-suggestions').show();
        departmentFiltered.forEach(item=>{
            $('.department-suggestions').append(`<div class="department-suggestion-item" id="suggestion-item-design">${item}</div>`);
        });

    }
    else{
        $('.department-suggestions').hide();
    }


  })

  $(document).on('click', '.department-suggestion-item', function () {
    $('.department-search').val($(this).text());
    $('.department-suggestions').hide();
  });

  $(document).click(function (e) {
    if (!$(e.target).closest('.department-search, .department-suggestions').length) {
      $('.department-suggestions').hide();
}
}

);



});
