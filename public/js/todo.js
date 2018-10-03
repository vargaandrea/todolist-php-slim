$(document).ready(function(){
  $('.add-todo').on('click', function(e){
	e.preventDefault();

    let $target = $(e.target);
    let $form = $($target.parents('form:first'));
    //let todoText = $('input[name="todo-text"]').val();

    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action'),
      data: $form.serialize(),
      success: function(response){
        console.log('yaay');
      },
      error: function(err){
        console.log(err);
      }
    });
  });
});