import urllib.request
import re
import os
import ssl

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}

urls = {
    "buildonhybrid": "https://buildonhybrid.com/",
    "atlas": "https://atlas.buildonhybrid.com/",
    "otto": "https://onchainotto.ai/",
    "tinycrews": "https://tinycrews.com/",
    "hisandhers": "https://hisandhers.com.pk/",
    "iqbalai": "https://iqbalai.com/"
}

for name, url in urls.items():
    print(f"\n--- {name} ({url}) ---")
    try:
        req = urllib.request.Request(url, headers=headers)
        with urllib.request.urlopen(req, context=ctx, timeout=10) as response:
            html = response.read().decode('utf-8', errors='ignore')
            
            # Find all image tags
            img_tags = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', html)
            print(f"Total img tags: {len(img_tags)}")
            for tag in img_tags[:15]:
                print(f"  {tag}")
                
            # Search for background images in css or style tags
            bg_imgs = re.findall(r'url\(["\']?([^"\')]+)["\']?\)', html)
            if bg_imgs:
                print(f"Total bg images: {len(bg_imgs)}")
                for bg in bg_imgs[:10]:
                    print(f"  BG: {bg}")
    except Exception as e:
        print(f"  Error: {e}")
