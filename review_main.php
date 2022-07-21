<?php
   include_once 'header.php';
?>

<div class="content home">
		<h2>Reviews</h2>
		<div class="reviews"></div>


		<script>
		const reviews_page_id = 1;
		
		// get code from review.php page by `college_id`
		fetch("mobile.php).then(response => response.text()).then(data => {
			// find element with `.reviews` and assign it all that code 
			document.querySelector(".reviews").innerHTML = data;
			document.querySelector(".reviews .write_review_btn").onclick = event => {
				// prevent default behaviour of link "Write Button" 
				event.preventDefault();
				// change display of "Write Review" section from `none` that displays nothing to `block`
				document.querySelector(".reviews .write_review").style.display = 'block';
				// when "write review" pressed the focus shift to "Your name" field. So we can start typing immediately
				document.querySelector(".reviews .write_review input[name='name']").focus();
			};
			// When "submit review" is pressed this event is activated
			document.querySelector(".reviews .write_review form").onsubmit = event => {
				// we prevent the form from submitting cause, we want to do it ourselves
				event.preventDefault();
				// send values of the form to the review.php with `college_id`
				fetch("reviews.php?page_id=" + reviews_page_id, {
					method: 'POST',
					body: new FormData(document.querySelector(".reviews .write_review form"))
				}).then(response => response.text()).then(data => {
					// return the review form to the closed state by changing
					document.querySelector(".reviews .write_review").innerHTML = data;
				});
			};
		});
		</script>
	</div>

     
<?php
   include_once 'footer.php';
?>