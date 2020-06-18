 $(document).ready(function(){
	//add recipe
	$('#submit_btn').click(function(){
		var name= $('#name').val();
		var type= $('#type').val();
		var difficulty=$('#difficulty').val();
		var recipe=$('#recipe').val();
		
		$.ajax({
			url: 'insert.php',
			type: 'POST',
			data: {
				'save':1,
				'name': name,
				'type':type,
				'difficulty':difficulty,
				'recipe': recipe
			},
			success:function(response){
				//delete the form fields after adding a recipe
				$('#name').val('');
				$('#type').val('');
				$('#difficulty').val('');
				$('#recipe').val('');
			}
		})
	});
	
	//delete recipe
	$('.delete').click(function(){
		var el = this;
		var id = this.id;
		var splitid = id.split("_");
		
		// Delete id
		var deleteid = splitid[1];
   
		$.ajax({
			url: 'delete.php',
			type: 'POST',
			data: {
				id:deleteid
			},
			success:function(response){
				$(el).closest('tr').fadeOut(800,function(){
					$(this).remove();
				});
			}
		})
	});
	
	//update
	$('.update_btn').click(function(){
		var el = this;
		var id = this.id;
		var splitid = id.split("_");
		
		// Updated id
		var updatedid = splitid[1];
		
		var name= $('#name').val();
		var type= $('#type').val();
		var difficulty=$('#difficulty').val();
		var recipe=$('#recipe').val();
		
		$.ajax({
			url: 'updated.php',
			type: 'POST',
			data: {
				'updated':1,
				'id': updatedid,
				'name': name,
				'type':type,
				'difficulty':difficulty,
				'recipe': recipe
			},
			success:function(response){
				alert('succes');
			}
		})
	});
	
	
	
 });