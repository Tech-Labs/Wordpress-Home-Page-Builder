(function($) {

  $(document).ready(function() {
    var screen_page = "editor";
    $("#hpb-button").click(function(){
        if(screen_page=="editor")
        {
            $("#wp-content-editor-container,.wp-editor-tabs,#insert-media-button").hide();
            $("#post-status-info").remove();
            $("#page-builder").show();
            $("#hpb-button").addClass("button-primary");
            screen_page = "hpb";
        }else{
            $("#wp-content-editor-container,.wp-editor-tabs,#insert-media-button").show();
            $("#page-builder").hide();
            $("#hpb-button").removeClass("button-primary");
            screen_page = "editor";
        }
    });

    $( "#sortable" ).sortable({
      placeholder: "widget-placeholder"
    });
    $( ".draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      scrollSensitivity: 20

    });
    $("#sortable").droppable({
                accept: '.widget',
                drop: function (event, ui) {
                    $("#sortable .widget").attr('style',' ');
                }
            });
    if($.trim( $("#sortable").html() ).length )
    {
      $("#hpb-button").trigger("click");
    }
    $(document).on("click","#add-new-hpb-widget",function(){
      if($("#title").val()=='')
      {
        alert("Plaese Enter Page Title Before save");
        return;
      }
      $(".spinner-contianer .spinner").addClass('is-active');
      var widget = [];
      $( "#sortable .widget-form" ).each(function() {
        obj = $( this ).find(':input').serializeArray();
        var out = {};
        $.each( obj, function( key, value ) {
          out[value.name] = value.value;
        });
        widget.push( out );
      });
      var data = JSON.stringify(widget);
      $.ajax({
        method: "POST",
        url: ajaxurl,
        data: { data: data, action: "hpb_add_widget",post_id:$("#post_ID").val(),page_template:$("#hpb_page_template option:selected").val(),sidebar:$("#hpb_sidebar option:selected").val() },
        success : function(){
          $(".spinner-contianer .spinner").removeClass('is-active');
          //$("#publish").trigger('click');
        }
      })
    });

    $(document).on("click",".widget-action,.hpb-control-close",function(){
        var _this = $(this).parents('.widget');
        if(_this.hasClass('open'))
        {
            _this.removeClass('open');
        }else{
            _this.addClass('open');
        }
        return false;
    });
    $(document).on('click','.hpb-control-remove',function(){
        $(this).parents('.widget').remove();
        return false;
    });
  });
})(jQuery);
