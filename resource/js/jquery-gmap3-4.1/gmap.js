$(function(){
	var panorama = {
      p: null,
      marker: null,
      infowindow: null,
      map: null,
      
      unset: function(){
        if (this.p){
          this.p.unbind("position");
          this.p.setVisible(false);
        }
        this.p = null;
        this.marker = null;
      },
      setMap: function(map){
        this.map = map;
      },
      setMarker: function(marker){
        this.marker = marker;
      },
      setInfowindow: function(infowindow){
        this.infowindow = infowindow;
      },
      open: function(){
        this.infowindow.open(this.map, this.marker);
      },
      run: function(id){
        if (!this.marker) return;
        this.p = new google.maps.StreetViewPanorama(document.getElementById(id), {
          navigationControl: true,
          navigationControlOptions: {style: google.maps.NavigationControlStyle.ANDROID},
          enableCloseButton: false,
          addressControl: false,
          linksControl: false
        });
        this.p.bindTo("position", this.marker);
        this.p.setVisible(true);
      }
    };
	function showMapBy(id,value,view,title,width,height){
		if(view=="street"){
			showMapStreet(id,value,title,width,height);
		}
		if(view=="normal"){
			showMapNormal(id, value,title);
		}	
	}

	function showMapBy(id,value,view,title){
		var width= 350;	
		var height=250;
		if(view=="street"){
			showMapStreet(id,value,title,width,height);
		}
		if(view=="normal"){
			showMapNormal(id, value,title);
		}	
	}

	function showMapStreet(id,value,text,width,height){
		$('#'+id).gmap3(
          { action:'init',
            options:{
              zoom: 18,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              streetViewControl: false,
              center: [46.782665,23.600006]
            },
            callback: function(map){
              panorama.setMap(map);
            }
          },
          { action: 'addMarker',
        	  latLng: value,
        	  address: value,
            marker:{
              options:{
                title: text,
                draggable: false
              },
              callback: function(marker){
                panorama.setMarker(marker);
              },
              events:{
                click: function(){
                  panorama.open();
                }
              }
            },
            infowindow:{
              options:{
                content: '<div id="gmap-container-streetview-content" style="width:'+width+'px;height:'+height+'px;"></div>'
              },
              callback: function(infowindow){
                panorama.setInfowindow(infowindow);
              },
              events:{
                domready: function(){
                  panorama.run('gmap-container-streetview-content');
                },
                closeclick: function(){
                  panorama.unset();
                }
              }
            }
          }
        );
	}

	function showMapNormal(id,value,text){
		 $("#"+id).gmap3(
          { action: 'addMarker',
            address: value,
      	  	latLng: value,
      	  marker:{
              options:{
                title: text,
                draggable: false
              }},
            map:{
              center: true,
              zoom: 18,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
          }
          );
	}       	
        var gmaps=document.getElementsByTagName("div");
		for(var i=0;i<gmaps.length;i++){
			if(gmaps[i].getAttribute("class")=="gmap-container"){
				var id=gmaps[i].getAttribute("id");
				var value=gmaps[i].getAttribute("value");
				var title=gmaps[i].getAttribute("title");
				var width=gmaps[i].getAttribute("gmap-width");
				var height=gmaps[i].getAttribute("gmap-height");
				var view=gmaps[i].getAttribute("view");
				if(width!==undefined && height!==undefined){
					showMapBy(id,value,view,title,width,height);	
				}
				else {
					showMapBy(id,value,view,title);
				}
			}
		}
});
