$(document).on('click', '.done', function(){
    $(this).find('i').attr('class', 'fa-solid fa-circle-check');
    $(this).removeClass('done');
    $(this).addClass('undone');

    if($('#id_user').length){
        let id = $(this).parents('.list-group-item').find('.id_task').val();
        changeStatus(id, 1);
    }
})

$(document).on('click', '.undone', function(){
    $(this).find('i').attr('class', 'fa-regular fa-circle-check');
    $(this).removeClass('undone');
    $(this).addClass('done');

    if($('#id_user').length){
        let id = $(this).parents('.list-group-item').find('.id_task').val();
        changeStatus(id, 0);
    }
})

function changeStatus(id, status){
    $.ajax({
        url: $('#formTask').attr('action')+'/changeStatus/'+id,
        type: 'PATCH',
        data: {'_token': $('#formTask').find("[name=_token]").val(), 'id': id, 'status': status},
        dataType: 'json',
        success: function(response){
            console.log(response.msg);
        }
    });
}

$(document).on('click','#sendTask', function(e){
    let task = $('#task').val();
    if(task.length>0){
        $(e.target).addClass('disabled');
        $(e.target).css('cursor','not-allowed');

        if($('#id_user').length){
            $.ajax({
                url: $('#formTask').attr('action'),
                type: 'POST',
                data: {'_token': $('#formTask').find("[name=_token]").val(), 'tarefa': task},
                dataType: 'json',
                success: function(response){

                    $('#home').prepend(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response.msg}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    addTask(task, response.id);

                    setTimeout(function() {
                        $( ".alert" ).slideUp( "slow");
                    }, 2000);

                }, error: function(error){
                    $('#myTabContent').append(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${error.msg}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                }
            });
        }else{
            addTask(task, '');
        }
        $(e.target).removeClass('disabled');
        $(e.target).css('cursor','pointer');

    }
})

function addTask(task, id){
    if($('#taskList').find('p')){ $('#taskList').find('p').remove(); }
    $('#task').val('');
    $('#home-tab').click();
    $('#taskList').append(`
        <li class="list-group-item d-flex justify-content-between">
            <input type="hidden" class="id_task" value="${id}">
            <div>
                ${task}
            </div>
            <div>
                <button class="btn btn-sm done"><i class="fa-regular fa-circle-check"></i></button>
                <button class="btn btn-sm taskItem-delete"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </li>`
    );
}

$(document).on('click', '.taskItem-delete', function(e){
    let id = $(this).parents('.list-group-item').find('.id_task').val();

    if(id){
        $.ajax({
            url: window.location+id,
            type: 'DELETE',
            data: {'_token': $('#formTask').find("[name=_token]").val()},
            dataType: 'json',
            success: function(response){
                console.log(response.msg);
                $(e.target).parents('.list-group-item').slideUp("slow");
                setTimeout(function() {
                    $(e.target).parents('.list-group-item').remove();
                }, 500);
            }
        });
    }else{
        $(e.target).parents('.list-group-item').slideUp("slow");
        setTimeout(function() {
            $(e.target).parents('.list-group-item').remove();
        }, 500);
    }

    if($('#taskList').find('.list-group-item').length==1){
        setTimeout(function() {
            $('#taskList').append('<p>Você ainda não possui nenhuma tarefa registrada em sua conta.</p>');
        }, 1000);
    }
})
