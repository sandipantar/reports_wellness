
<html>
    <head>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,700,300italic);
            *, *:before, *:after { box-sizing: border-box; }
            html { font-size: 100%;  }
            body { 
              font-family: 'Open Sans', sans-serif;
              font-size: 16px;
              background: #d0e6ef; 
              color: #666;
            }
            
            .wrapper {
              max-width: 75%;
              margin: auto;
            }
            
            
            h1 { 
              color: #555; 
              margin: 3rem 0 1rem 0; 
              padding: 0;
              font-size: 1.5rem;
            }
            
            textarea {
              width: 100%;
              min-height: 100px;
              resize: none;
              border-radius: 8px;
              border: 1px solid #ddd;
              padding: 0.5rem;
              color: #666;
              box-shadow: inset 0 0 0.25rem #ddd;
              &:focus {
                outline: none;
                border: 1px solid darken(#ddd, 5%);
                box-shadow: inset 0 0 0.5rem darken(#ddd, 5%);
              }
              &[placeholder] { 
                font-style: italic;
                font-size: 0.875rem;
              }
            }
            
            #the-count {
              float: right;
              padding: 0.1rem 0 0 0;
              font-size: 0.875rem;
            }
        </style>
    </head>
    <body>
       <textarea class="mt-5" maxlength="1000" style="height:326px"></textarea>
        <div id="the-count">
            <span id="current">0</span>
            <span id="maximum">/ 1000</span>
          </div 
    </body>
</html>