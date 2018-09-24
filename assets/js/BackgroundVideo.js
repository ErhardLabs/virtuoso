$=jQuery;

$(document).ready(function() {

  let homeVideo = $('#landing_yt_player').data('id');
  let playlistID = $('#landing_yt_player').data('playlist-id');
  let homeVideoStartTime = $('#landing_yt_player').data('start-time');
  let thumb = '<img src="https://img.youtube.com/vi/'+homeVideo+'/maxresdefault.jpg">';
  let thumbSrc = 'https://img.youtube.com/vi/'+homeVideo+'/maxresdefault.jpg';

  if (typeof homeVideo !== 'undefined') {

    if ($(window).width() < 768) {

      $('body').prepend(
          '<div class="video-background" style="background-image: url('+thumbSrc+')">' +
          '<div class="video-foreground" >' +
          '</div>' +
          '</div>'
      );

    } else {

      let fullPath = location.pathname + location.search + location.hash;

      // INSERT VIDEO PLAYER
      $('body').prepend(
          '<div class="video-background">' +
          '<div class="video-foreground">' +
          '<iframe class="home_video" id="yt_home_embed" width="1280" height="720" src="https://www.youtube.com/embed/' + homeVideo + '?rel=0&controls=0&showinfo=0&autoplay=1&loop=1&enablejsapi=1&playlist='+playlistID+'&start='+homeVideoStartTime+'" frameborder="0" allowfullscreen volume="0"></iframe>' +
          '</div>' +
          '</div>'
      );

    }

    // Loads the IFrame Player API code asynchronously.
    let tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    let firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    let player;

    // LOAD iFrame after content loads and a button is clicked
    let div, n,
        v = document.getElementsByClassName("youtube-player");
    for (n = 0; n < v.length; n++) {
      div = document.createElement("div");
      div.setAttribute("data-id", v[n].dataset.id);
      div.innerHTML = labnolThumb(v[n].dataset.id);
      div.onclick = labnolIframe;
      v[n].appendChild(div);
    }


  }


});

function onYouTubeIframeAPIReady() {
  let player = new YT.Player('yt_home_embed', {
    events: {
      'onReady': onPlayerReady
    }
  });
}

function onPlayerReady() {
  // Mute!
  player.mute();
  player.playVideo();
}


function labnolThumb(id) {
  let homeVideo = $('#landing_yt_player').data('id');
  // let thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">';
  let thumb = '<img src="https://img.youtube.com/vi/'+homeVideo+'/0.jpg">';
  let play = '<div class="play"></div>';
  return thumb.replace("ID", id) + play;
}

function labnolIframe() {

  let playlistID = $('#landing_yt_player').data('playlist-id');
  let iframe = document.createElement("iframe");
  let embed = "https://www.youtube.com/embed/videoseries?list="+playlistID;
  iframe.setAttribute("src", embed);
  iframe.setAttribute("frameborder", "0");
  iframe.setAttribute("allowfullscreen", "1");
  this.parentNode.replaceChild(iframe, this);
}