<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Packages -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/5810dc9d6a.js" crossorigin="anonymous"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


        <!-- Styles -->
        <style>
           /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 54px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            } */
        </style>

<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script>
    Twilio.Video.createLocalTracks({
       audio: true,
       video: true,
       //tracks: []
    }).then(function(localTracks) {
       return Twilio.Video.connect('{{ $accessToken }}', {
           name: '{{ $roomName }}',
           tracks: localTracks,
           //video: true,
           //tracks: []
       });
    }).then(function(room) {
       console.log('Successfully joined a Room: ', room.name);

       room.participants.forEach(participantConnected);

       var previewContainer = document.getElementById(room.localParticipant.sid);
       if (!previewContainer || !previewContainer.querySelector('video')) {
           LocalparticipantConnected(room.localParticipant);
       }

       room.on('participantConnected', function(participant) {
           console.log('Joining: ' , participant.identity);
           participantConnected(participant);
       });

       room.on('participantDisconnected', function(participant) {
           console.log('Disconnected: ',  participant.identity );
           participantDisconnected(participant);
       });
    });
    // additional functions will be added after this point

    function LocalparticipantConnected(participant) {
   console.log('Participant "%s" connected', participant.identity);

       const div = document.createElement('div');
       //div.id = participant.sid;
       //div.setAttribute("style", "float: left; margin: 10px;");
       //div.innerHTML = "<div class='absolute top-0 right-0' style='clear:both;'>" +participant.identity+ "</div>";

       participant.tracks.forEach(function(track) {
           LocaltrackAdded(div, track)
       });

       participant.on('trackAdded', function(track) {
           LocaltrackAdded(div, track)
       });
       participant.on('trackRemoved', trackRemoved);

       document.getElementById('media-div').appendChild(div);
    }

    function participantConnected(participant) {
   console.log('Participant "%s" connected', participant.identity);

       const div = document.createElement('div');
      //div.id = participant.sid;
     //div.setAttribute("style", "float: left; margin: 10px;");
     //div.innerHTML = "<div style='clear:both;'>" +participant.identity+ "</div>";

       participant.tracks.forEach(function(track) {
           trackAdded(div, track)
       });

       participant.on('trackAdded', function(track) {
           trackAdded(div, track)
       });
       participant.on('trackRemoved', trackRemoved);

       document.getElementById('media-div').appendChild(div);
    }

    function participantDisconnected(participant) {
       console.log('Participant "%s" disconnected', participant.identity);

       participant.tracks.forEach(trackRemoved);
       document.getElementById(participant.sid).remove("video")[0];
    }

  function trackAdded(div, track) {
       div.appendChild(track.attach());
       var video = div.getElementsByTagName("video")[0];
       if (video) {
           video.setAttribute("style", "");
           video.setAttribute("class", "bg-indigo-500 object-center absolute z-20 inset-0 h-full w-full");
           video.style.transform = 'scale(-1, 1)';
       }
    }


  function LocaltrackAdded(div, track) {
       div.appendChild(track.attach());
       var video = div.getElementsByTagName("video")[0];
       if (video) {
           video.setAttribute("style", "max-width:160px; max-height: 160px;");
           video.setAttribute("class", "bg-indigo-500 object-center z-40 h-18 w-20 md:h-auto md:w-auto absolute top-0 right-0");
           video.setAttribute("id", "localVid");
           video.style.transform = 'scale(-1, 1)';
       }
    }

    function trackRemoved(track) {
       track.detach().forEach( function(element) { element.remove() });
    };

$(function() {
    jQuery.fn.extend({
        hidden: function(state) {
            return this.each(function() {
                this.hidden = state;
            });
        }
    });
    
    $('button[id="mute_btn"]').hidden(false);
    $('button[id="unmute_btn"]').hidden(true);
    $('button[id="vid_mute_btn"]').hidden(false);
    $('button[id="vid_unmute_btn"]').hidden(true);
  });

    //Audio Mute
    function tglMute(room){
    $('button[id="mute_btn"]').hidden(true);
    $('button[id="unmute_btn"]').hidden(false);

    var localParticipant = room.localParticipant;
    localParticipant.audioTracks.forEach(function (audioTrack) {
       audioTrack.disable();
    });

    Swal.fire({
      position: 'top-right',
      icon: 'info',
      title: 'Audio Muted',
      showConfirmButton: false,
      timer: 1000
      });

  }
    //Audio Unmute
    function tglUnmute(room){
    $('button[id="mute_btn"]').hidden(false);
    $('button[id="unmute_btn"]').hidden(true);
    
    document.getElementById("localVid").muted = false;

    Swal.fire({
    position: 'top-right',
    icon: 'info',
    title: 'Audio Unmuted',
    showConfirmButton: false,
    timer: 1000
    });
  }

  //Video Mute
    function tglVidMute(){
    $('button[id="vid_mute_btn"]').hidden(true);
    $('button[id="vid_unmute_btn"]').hidden(false);
      
    var localParticipant = room.localParticipant;
    localParticipant.videoTracks.forEach(function (videoTracks) {
        videoTracks.track.disable();

    });
    
    Swal.fire({
      position: 'top-right',
      icon: 'info',
      title: 'Video Disabled',
      showConfirmButton: false,
      timer: 1000
    })

  }

    //Video Unmute
    function tglVidUnmute(){
    $('button[id="vid_mute_btn"]').hidden(false);
    $('button[id="vid_unmute_btn"]').hidden(true);

    var localParticipant = room.localParticipant;
    localParticipant.videoTracks.forEach(function (videoTracks) {
        videoTracks.track.enable();
    });

    Swal.fire({
    position: 'top-right',
    icon: 'info',
    title: 'Video Enabled',
    showConfirmButton: false,
    timer: 1000
    })

  }
</script>

<!-- mute/unmute -->
<script>


</script>

    </head>
    <body>
        <!-- This is an example component -->
<div class="flex flex-row h-full">
  <!-- Sidebar -->
      <nav class="bg-gray-900 w-16 md:w-20  justify-between flex flex-col ">
        <div class="mt-10">
          <a href="#">
            <img
              src="https://randomuser.me/api/portraits/women/76.jpg"
              class="rounded-full w-10 h-10 mb-3 mx-auto"
            />
          </a>
          <div class="mt-8 md:mt-10">
            <ul>
              <li class="mb-6">
                <button id="mute_btn" class="focus:outline-none" onClick="tglMute(room);">
                  <span>
                  <i class="px-6 md:px-8 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-microphone-alt text-green-500 hover:text-green-700"></i>
                  </span>
                </button>

                <button id="unmute_btn" class="focus:outline-none" onClick="tglUnmute(room);">
                  <span>
                  <i class="px-6 md:px-8 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-microphone text-gray-500 hover:text-gray-700"></i>
                  </span>
                </button>
              </li>
            <!--  <li class="mb-6">
                <a href="#">
                  <span>
                  <i class="px-6 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-phone-slash text-red-500 hover:text-red-700"></i>
                  </span>
                </a>
              </li> -->
              <li class="mb-6">
                 <button id="vid_mute_btn" class="focus:outline-none px-1" onClick="tglVidMute();">
                  <span>
                  <i class="px-4 md:px-6 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-video text-indigo-500 hover:text-indigo-700"></i>
                  </span>
                </button>
                 <button id="vid_unmute_btn" class="focus:outline-none px-1" onClick="tglVidUnmute();">
                  <span>
                  <i class="px-4 md:px-6 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-video text-gray-500 hover:text-gray-700"></i>
                  </span>
                </button>
              </li>
              <li class="mb-6">
                <a href="#">
                  <span class="px-1">
                  <i class="px-4 md:px-6 mb-1 md:mb-2 lg:mb-4 text-xl md:text-2xl fas fa-power-off fill-current text-red-500 hover:text-red-700"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="mb-4">
          
        </div>
      </nav>
  <div class="flex items-center justify-center px-3 md:px-5 py-5 text-gray-700 bg-gray-800 h-screen w-screen overflow-y-hidden">
    
    <!-- Content -->
    <div id="media-div" class="md:mx-auto relative bg-black flex lg:flex-row flex-col items-center justify-center space-x-0 lg:space-x-20 md:px-18 w-full h-full">

    </div>
      </div>
    </div>
    </body>
</html>


