jQuery(function ($) {
  var page = 1;
  var loading = false;

  function loadPosts() {
    var data = {
      action: "load_more_posts",
      page: page,
    };

    $.ajax({
      type: "POST",
      data: data,
      dataType: "html",
      url: ajax_load_more_params.ajax_url,
      success: function (response) {
        if (response) {
          $(".post").append(response);
          page++;
          loading = false;
        }
      },
    });
  }

  loadPosts();

  $(".load-more-button").on("click", function () {
    if (!loading) {
      loading = true;
      loadPosts();
    }
  });
});
