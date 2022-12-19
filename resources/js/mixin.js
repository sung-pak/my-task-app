
function ajaxSend(obj){
  //console.log(obj)
  obj = JSON.stringify(obj);

  $.ajax({ type: "POST",
    async: false,
    url: "/update-task",
    data: {data:obj},
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    dataType: "json",
    success: function(data){
      if(data.success==1){

        const tt = $("#table-1");
        let rows = tt.find('tbody tr');

        for(var i=0; i<rows.length; i++) {
          let i2 = i + 1;
          rows.eq(i).find('td.priority').text(i2);
        } 
      }
    }
  });
}

$(document).ready(function() {

  let tt = $("#table-1").tableDnD({
    onDragClass: "dragging",
		onDrop: function(table, row) {
      //console.log('dragged');

			let rows = table.tBodies[0].rows;
      let count1 = [];

			for (var i=0; i<rows.length; i++) {

        let newI = i + 1;
        let iid = tt.find('tr').eq(newI).find('.id').text();

        count1.push(parseInt(iid));
			} 

      ajaxSend(count1);
		},
		onDragStart: function(row) {
      //console.log('dragging');
		},
   
  });

});