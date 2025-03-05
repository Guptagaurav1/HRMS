$(document).ready(function(){ 
    function dtable(){
        
        $('#project-table').DataTable({ 
        
                "bDestroy":true,   
                dom: 'Bfrtip',
                dom: 'lBfrtip',
            
                processing: true,
                serverSide: true,
                searching: true,
                
                lengthMenu: [
                            [ 10,50,100,150,200,250,500,1000, -1],
                            [ '10 rows', '50 rows','100 rows','150 rows','200 rows', '250 rows','500 rows','1000 rows','Show All rows']
                            ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                "order": [],
                ajax: SITE_URL+'/hr/project/projectlist',
                    columns: [  
                    { data: 's_no',orderable:true,visible:true, searchable:true },
                    
                    { data: 'organization',orderable:true,visible:true },
                    
                    { data: 'project_name',orderable:true,visible:true },
                    { data: 'project_number',orderable:true,visible:true },
                    { data: 'empanelment_reference',orderable:true,visible:true },
                    { data: 'action',orderable:true,visible:true },
                        
                
                    ]  
        });
                
    }
    dtable();

});