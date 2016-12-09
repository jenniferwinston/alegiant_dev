var jobsArr = [{"id":10643,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1337609105203,"address":{"address1":"BLANK","city":"Las Palomas","state":"NM","zip":"87942","countryID":1},"employmentType":"Unknown","title":"OT","description":null,"_score":1},{"id":10644,"clientCorporation":{"id":17572,"name":"Burger Rehabilitation Systems-Main"},"clientContact":{"id":31696,"firstName":"Generic","lastName":"Contact"},"dateAdded":1335373911620,"address":{"address1":"BLANK","city":"City of Industry/El Monte","state":"CA","zip":"90601","countryID":1},"employmentType":"Unknown","title":"OT","description":null,"_score":1},{"id":10645,"clientCorporation":{"id":8016,"name":"Welsh Bello - Main"},"clientContact":{"id":24939,"firstName":"Generic","lastName":"Contact"},"dateAdded":1340972702610,"address":{"address1":"BLANK","city":"Elizabethton","state":"TN","zip":"37643","countryID":1},"employmentType":"Unknown","title":"SLP","description":null,"_score":1},{"id":10646,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1317387717933,"address":{"address1":"BLANK","city":"Redding","state":"CA","zip":"96001","countryID":1},"employmentType":"Unknown","title":"OT or COTA","description":null,"_score":1},{"id":10647,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1433528334893,"address":{"address1":"BLANK","city":"Portsmouth","state":"OH","zip":null,"countryID":1},"employmentType":"Unknown","title":"Physical Therapist/ PT","description":"Alegiant has an opportunity for a licensed Physical Therapist in Ohio at a Skilled Nursing Facility (SNF) \n•Careers involve evaluation and treatment of individuals of all ages and abilities suffering from injuries or illnesses affecting physical functionality\n•Diagnose and manage movement dysfunction and enhance physical and functional abilities\n•Restore, maintain, and promote not only optimal physical function but optimal wellness and fitness and optimal quality of life as it relates to movement and health.\n•Work to devise a customized physical rehabilitation plan to enhance flexibility, strength, range of motion, and motor control, while reducing pain, discomfort and swelling \n• Prevent the onset, symptoms, and progression of impairments, functional limitations, and disabilities that may result from diseases, disorders, conditions, or injuries.\n \nQualifications of the Physical Therapist (PT): \n•Bachelor’s degree from an accredited Physical Therapy Program \n•Current state license or eligibility to practice as a Registered Physical Therapist (PT) in Ohio\n\nBenefits for the Physical Therapist (PT): \n• Competitive salary \n• Weekly pay with direct deposit \n• Housing stipends \n• Medical/Dental/Vision \n• Continuing Ed/Licensure \n• Matching 401K \n\nAbout Alegiant Services: \nAlegiant Services has over 10 years of successful experience in placing qualified healthcare professionals. We have established long term relationships with healthcare facilities and hospitals all over the United States. Having done so, we can offer you the best possible opportunity for you to most fully utilize your professional skills. We will keep your job search confidential, present you to all the jobs available in your desired location and setting, negotiate the best salary, and get you responses ASAP from employers. \nAlegiant Services is now interviewing qualified & interested candidates for this position. For immediate consideration, please email your resume to info@alegiantservices.com","_score":1},{"id":10648,"clientCorporation":{"id":8194,"name":"LaVie Rehab - Main"},"clientContact":{"id":38033,"firstName":"Generic","lastName":"Contact"},"dateAdded":1317219723440,"address":{"address1":"BLANK","city":"PERRY","state":"FL","zip":"32347","countryID":1},"employmentType":"Unknown","title":"PT","description":null,"_score":1}];

function displayJobInfo(job){
	var listingDate = job.dateAdded;
	console.log(job);
	$(".banner").html("<h1>" + job.title + "</h1>");
	$(".jobTitle").html(job.title);
	$(".jobPost").html(
		'<ul id="listedJobInfo">' + 
		'<li id="employmentType">Employment Type</li>' +
		'<li id="location">' + 
		'<a href=""><i class="fa fa-map-marker" aria-hidden="true">' + 
		'</i>' + job.address.city + ', ' + job.address.state + '</a></li>' + 
		'<li id="postDate">' + 
		'<i class="fa fa-calendar" aria-hidden="true"></i>Posted ' + (moment(listingDate).diff( moment(), "months") * -1) + " months ago" + '</li>' +
		'</ul>' + 
		'<div class="jobInfo">' + 
		'<h3>Job Description</h3>' + 
		'<div class="jobDescription">' +
		job.description + 
		'</div>' +
		'<button id="applyForJob">Apply for this job</button>' + 
		'</div>');
}

displayJobInfo(jobsArr[4]);


$("#jobSeekersBtn, #jobSeekDropdown").hover(function(){
    	$("#jobSeekDropdown").css("display", "block");
    	$("#jobSeekerBtn").css("borderRadius", "7px 7px 7px 7px");
    	$("#jobSeekerBtn").css("backgroundColor", "#e3e4e6");
    }, function(){
    	$("#jobSeekDropdown").css("display", "none");
});

