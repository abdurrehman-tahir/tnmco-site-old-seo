import urllib.request
import re
import ssl

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}

url = "https://buildonhybrid.com/"
try:
    req = urllib.request.Request(url, headers=headers)
    with urllib.request.urlopen(req, context=ctx, timeout=10) as response:
        html = response.read().decode('utf-8', errors='ignore')
        
        # Look for framer image hosting domains in the source html
        framer_urls = re.findall(r'https://framerusercontent\.com/images/[a-zA-Z0-9_-]+\.[a-zA-Z0-9]+', html)
        # remove duplicates
        framer_urls = list(set(framer_urls))
        print(f"Found {len(framer_urls)} Framer usercontent images:")
        for fu in framer_urls[:40]:
            print(f"  {fu}")
except Exception as e:
    print(f"Error: {e}")
