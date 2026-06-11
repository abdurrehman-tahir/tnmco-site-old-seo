import sys, re, json
h = sys.stdin.read()
for i,b in enumerate(re.findall(r'<script type="application/ld\+json">(.*?)</script>', h, re.DOTALL)):
    try: json.loads(b)
    except Exception as e: print("  BAD JSON-LD block",i,":",e); sys.exit(3)
