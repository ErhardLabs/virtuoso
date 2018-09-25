class BackgroundVideo {

  constructor() {

    this.homeVideo = $('#landing_yt_player').data('id');
    this.playlistID = $('#landing_yt_player').data('playlist-id');
    this.homeVideoStartTime = $('#landing_yt_player').data('start-time');
    // this.thumb = '<img src="https://img.youtube.com/vi/'+homeVideo+'/maxresdefault.jpg">';
    // this.thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">';
    this.thumb = '<img src="https://img.youtube.com/vi/'+this.homeVideo+'/0.jpg">';
    this.thumbSrc = 'https://img.youtube.com/vi/'+this.homeVideo+'/maxresdefault.jpg';
    this.play = '<div class="play"></div>';

    this.addVideoHTML();

    // Loads the IFrame Player API code asynchronously.
    BackgroundVideo.loadIframePlayerAPI();

    this.processIframe();

  }

  addVideoHTML() {

    if (typeof this.homeVideo !== 'undefined') {

      if ($(window).width() < 768) {

        $('body').prepend(
            '<div class="video-background" style="background-image: url('+this.thumbSrc+')">' +
            '<div class="video-foreground" >' +
            '</div>' +
            '</div>'
        );

      } else {

        let src = 'https://www.youtube.com/embed/' + this.homeVideo + '?rel=0&controls=0&showinfo=0&autoplay=1&disablekb=1&loop=1&enablejsapi=1';

        if (this.playlistID !== '') {
          src += '&playlist=' + this.playlistID;
        }

        if (this.homeVideoStartTime !== '') {
          src += '&start='+this.homeVideoStartTime;
        }


        // INSERT VIDEO PLAYER
        $('body').prepend(
            '<div class="video-background">' +
            '<div class="video-foreground">' +
            '<iframe class="home_video" id="yt_home_embed" width="1280" height="720" src="'+src+'" frameborder="0" allowfullscreen></iframe>' +
            '</div>' +
            '</div>'
        );

      }

    }

  }

  // Loads the IFrame Player API code asynchronously.
  static loadIframePlayerAPI() {
    let tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    let firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    console.log(tag);
  }


  processIframe() {

    let div;
    let n;
    this.player = {};
    let v = document.getElementById("yt_home_embed");
    let id = v.dataset.id;


    div = document.createElement("div");
    div.setAttribute("data-id", id);
    div.innerHTML = this.thumb.replace("ID", id) + this.play;

    let self = this;

    div.onload = function() {
      let iframe = document.createElement("iframe");
      let embed = "https://www.youtube.com/embed/videoseries?list="+self.playlistID;
      iframe.setAttribute("src", embed);
      iframe.setAttribute("frameborder", "0");
      iframe.setAttribute("allowfullscreen", "1");
      console.log(this);
      this.parentNode.replaceChild(iframe, this);
  };

    v.appendChild(div);


  }


}


new BackgroundVideo();

window.onYouTubeIframeAPIReady = function() {
  document.dispatchEvent(new CustomEvent('onYouTubeIframeAPIReady', {}))

  console.log('YT API loaded!');
  let player = new YT.Player('yt_home_embed', {
    events: {
      'onReady': function() {
        // Mute!
        player.mute();
        player.playVideo();
      }
    }
  });
};