## Setup
On lectura:

```bash
git clone git@github.com:cjlarose/web-assg1.git
make
cd build
python -m SimpleHTTPServer
```

On your machine:

```bash
ssh -L 9000:lectura.cs.arizona.edu:8000 lectura
```

Then visit localhost:9000 in your browser.
