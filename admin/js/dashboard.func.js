
$(document).ready(function() {

  $('.load-comment').click(function() {
    let id = $(this).attr('id')
    $.post('ajax/load_comment.php', {id : id}, function() {
      $('#commentaire_' + id).hide()
    })
  })

  $('.delete-comment').click(function() {
    let id = $(this).attr('id')
    $.post('ajax/delete_comment.php', {id : id}, function() {
      $('#commentaire_' + id).hide()
    })
  })
  
})