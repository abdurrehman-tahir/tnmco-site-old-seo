import urllib.request
import re
import os
import ssl

# Disable SSL verification for searching (some sites might have self-signed or expired dev certs)
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

urls = {
    "tinycrews": "https://tinycrews.com/",
    "hisandhers": "https://hisandhers.com.pk/",
    "buildonhybrid": "https://buildonhybrid.com/",
    "iqbalai": "https://iqbalai.com/",
    "atlas": "https://atlas.buildonhybrid.com/",
    "otto": "https://onchainotto.ai/"
}

for name, url in urls.items():
    print(f"--- Fetching {name} ({url}) ---")
    try:
        req = urllib.request.Request(
            url, 
            headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}
        )
        with urllib.request.urlopen(req, context=ctx, timeout=10) as response:
            html = response.read().decode('utf-8', errors='ignore')
            
            # Look for logo references
            # Search for <img ... src="...">
            imgs = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', html)
            # Search for og:image
            og_images = re.findall(r'<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']', html)
            og_images_2 = re.findall(r'<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']', html)
            # Search for shortcut icon / favicon
            favicons = re.findall(r'<link[^>]+rel=["\'](?:shortcut )?icon["\'][^>]+href=["\']([^"\']+)["\']', html)
            favicons_2 = re.findall(r'<link[^>]+href=["\']([^"\']+)["\'][^>]+rel=["\'](?:shortcut )?icon["\']', html)
            
            print(f"Found {len(imgs)} img tags.")
            for img in imgs[:15]:
                if any(k in img.lower() for k in ['logo', 'brand', 'header', 'icon', 'favicon']):
                    print(f"  Img: {img}")
            
            all_ogs = og_images + og_images_2
            if all_ogs:
                print(f"  OG Image: {all_ogs[0]}")
            
            all_favs = favicons + favicons_2
            if all_favs:
                print(f"  Favicon: {all_favs[0]}")
                
    except Exception as e:
        print(f"Error fetching {url}: {e}")
