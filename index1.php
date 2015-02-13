<html>
<script>

</script>

<body>

<div align="center">
  <video id="basic-stream" class="videostream" autoplay=""></video>
  <p><button id="capture-button" onclick="start_screen_sharing()" >Capture video</button> 
  <button id="stop-button" onclick="stop_screen_sharing()">Stop</button></p>
</div>


<script>
	
	var errorCallback = function(e) {	console.log('Rejected!', e);	};

	navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
                          
	var video = document.querySelector('video');
	
	function start_screen_sharing()
	{
		
		if (navigator.getUserMedia) 
		{
			navigator.getUserMedia({audio: true, video: true}, function(stream) {
				video.src = window.URL.createObjectURL(stream);
			}, errorCallback);
			
			var hdConstraints = {
			  video: {
				mandatory: {
				  minWidth: 1280,
				  minHeight: 720
				}
			  }
			};
			navigator.getUserMedia(hdConstraints, successCallback, errorCallback); 


			MediaStreamTrack.getSources(function(sourceInfos) { 
			  var audioSource = null; 
			  var videoSource = null; 

			  for (var i = 0; i != sourceInfos.length; ++i) { 
				var sourceInfo = sourceInfos[i]; 
				if (sourceInfo.kind === 'audio') { 
				  console.log(sourceInfo.id, sourceInfo.label || 'microphone'); 

				  audioSource = sourceInfo.id; 
				} else if (sourceInfo.kind === 'video') { 
				  console.log(sourceInfo.id, sourceInfo.label || 'camera'); 

				  videoSource = sourceInfo.id; 
				} else { 
				  console.log('other source: ', sourceInfo); 
				}
			  }
			  sourceSelected(audioSource, videoSource);
			});

			function sourceSelected(audioSource, videoSource) {
			  var constraints = {
				audio: {
				  optional: [{sourceId: audioSource}]
				},
				video: {
				  optional: [{sourceId: videoSource}]
				}
			  };
			  navigator.getUserMedia(constraints, successCallback, errorCallback);
			} 
								
			function fallback(e) {
			  video.src = 'videoonfailure.webm';
			}

			function success(stream) {
			  video.src = window.URL.createObjectURL(stream);
			}

			if (!navigator.getUserMedia) {
			  fallback();
			} else {
			  navigator.getUserMedia({video: true}, success, fallback);
			}		
			
		} 
		else 
		{
			video.src = 'somevideo.webm'; 
		}    
	
	}
	
	
	function stop_screen_sharing()
	{
		video.pause();
		localMediaStream.stop(); 
	}
	
</script>


</body>
</html>
