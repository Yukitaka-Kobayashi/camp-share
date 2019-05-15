//セレクトボックス変更用
$(function(){
    var $children = $('.children'); //キャンプ場の要素を変数に入れます。
    var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
     
    //地域側のselect要素が変更になるとイベントが発生
    $('.parent').change(function() {
     
          //選択された地域のvalueを取得し変数に入れる
          var val1 = $(this).val();
         
          //削除された要素をもとに戻すため.html(original)を入れておく
          $children.html(original).find('option').each(function() {
            var val2 = $(this).data('val'); //data-valの値を取得
         
            //valueと異なるdata-valを持つ要素を削除
            if (val1 != val2) {
              $(this).not(':first-child').remove();
            }
         
          });
         
          //地域側のselect要素が未選択の場合、キャンプ場をdisabledにする
          if ($(this).val() == "") {
            $children.attr('disabled', 'disabled');
          } else {
            $children.removeAttr('disabled');
          }
     
    });
});