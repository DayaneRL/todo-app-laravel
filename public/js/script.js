$(document).on('click', '.undone', function(){
    $(this).find('i').attr('class', 'fa-solid fa-circle-check');
    $(this).removeClass('undone');
    $(this).addClass('done');
})

$(document).on('click', '.done', function(){
    $(this).find('i').attr('class', 'fa-regular fa-circle-check');
    $(this).removeClass('done');
    $(this).addClass('undone');
})

$(document).on('click','#sendTask', function(e){
    let task = $('#task').val();
    if(task.length>0){
        $(e.target).addClass('disabled');
        $(e.target).css('cursor','not-allowed');

        $.ajax({
            url: $('#formTask').attr('action'),
            type: 'POST', 
            data: {'_token': $('#formTask').find("[name=_token]").val(), 'tarefa': task}, 
            dataType: 'json',
            success: function(response){
                console.log(response)
                // $('#myTabContent').append(`
                //     <div class="alert alert-success alert-dismissible fade show" role="alert">
                //         ${response.msg}
                //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //             <span aria-hidden="true">&times;</span>
                //         </button>
                //     </div>
                // `);

                // $('#task').val('');
                // $('#home-tab').click();
                // $('#taskList').append(`
                //     <li class="list-group-item d-flex justify-content-between">
                //         <div>
                //             ${task}
                //         </div>
                //         <div>
                //             <button class="btn btn-sm undone"><i class="fa-regular fa-circle-check"></i></button>
                //             <button class="btn btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                //         </div>
                //     </li>`
                // );
            }, error: function(error){
                console.log(error)
                // $('#myTabContent').append(`
                //     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                //         ${error.msg}
                //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //             <span aria-hidden="true">&times;</span>
                //         </button>
                //     </div>
                // `);
            }
        });

       
    }
})