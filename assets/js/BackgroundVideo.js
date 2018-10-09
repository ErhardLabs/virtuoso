class BackgroundVideo {

  constructor() {

    let self = this;

    document.addEventListener("DOMContentLoaded", function(event) {
      self.homeVideo = $('#landing_yt_player').data('id');
      self.playlistIDs = $('#landing_yt_player').data('playlist-id');
      self.homeVideoStartTime = $('#landing_yt_player').data('start-time');
      self.belowHeader = $('#landing_yt_player').data('below-header');
      // this.thumb = '<img src="https://img.youtube.com/vi/'+homeVideo+'/maxresdefault.jpg">';
      // this.thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">';
      self.thumb = '<img src="https://img.youtube.com/vi/' + self.homeVideo + '/0.jpg">';
      self.thumbSrc = 'https://img.youtube.com/vi/' + self.homeVideo + '/maxresdefault.jpg';
      self.play = '<div class="play"></div>';

      self.addVideoHTML();

      // Loads the IFrame Player API code asynchronously.
      BackgroundVideo.loadIframePlayerAPI();

      // self.processIframe();
    });

  }

  addVideoHTML() {

    if (this.homeVideo || this.playlistIDs) {

      let offset = (this.belowHeader) ? document.getElementsByClassName('site-header')[0].offsetHeight : 0;
      // offset += (document.getElementById('wpadminbar')) ? document.getElementById('wpadminbar').offsetHeight : 0;
      offset+='px';

      if ($(window).width() > 576 ) {
        // let src = 'https://www.youtube.com/embed/' + this.homeVideo + '?rel=0&controls=0&showinfo=0&autoplay=1&disablekb=1&loop=1&enablejsapi=1';
        let src = 'https://www.youtube.com/embed/';

        if (this.playlistIDs !== '') {
          src += '?rel=0?listType=playlist&list='+ this.playlistIDs + '&controls=0&showinfo=0&autoplay=1&loop=1&enablejsapi=1';
        } else {
          src += this.homeVideo + '?rel=0&controls=0&showinfo=0&autoplay=1&loop=1&enablejsapi=1&playlist=' + this.homeVideo;
        }


        if (this.homeVideoStartTime !== '') {
          src += '&start=' + this.homeVideoStartTime;
        }


        // INSERT VIDEO PLAYER
        $('body').prepend(
            '<div class="video-background">' +
            '<div class="video-foreground">' +
            '<iframe class="home_video" id="yt_home_embed" width="2460" height="1440" src="' + src + '" frameborder="0" allowfullscreen style="top: ' + offset +'"></iframe>' +
            '<div class="video-overlay" >' +
            '</div>' +
            '</div>'
        );

      }

    }

  }

  // Loads the IFrame Player API code asynchronously.
  static loadIframePlayerAPI() {
    let tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
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

    div.onload = function () {
      let iframe = document.createElement("iframe");
      let embed = "https://www.youtube.com/embed/videoseries?list=" + self.playlistID;
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

window.onYouTubeIframeAPIReady = function () {
  document.dispatchEvent(new CustomEvent('onYouTubeIframeAPIReady', {}))

  console.log('YT API loaded!');
  let player = new YT.Player('yt_home_embed', {
    events: {
      'onReady': function () {
        // Mute!
        player.mute();
        player.playVideo();
      }
    }
  });
};