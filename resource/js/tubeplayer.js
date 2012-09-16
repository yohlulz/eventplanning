 $(function() {
	function playVideo(divId,videoId){
						jQuery("#"+divId).tubeplayer({
							width: 690, 
							height: 500,
							theme: "light", 
							initialVideo: videoId, 
							preferredQuality: "default"
			});}
			var youtubePlayer=document.getElementsByTagName("div");
			for(var i=0;i<youtubePlayer.length;i++)
			{
				if(youtubePlayer[i].getAttribute("class")=="youtube-player-container")
				{
					playVideo(youtubePlayer[i].getAttribute("id"),youtubePlayer[i].getAttribute("v"));
				}
			}
});
