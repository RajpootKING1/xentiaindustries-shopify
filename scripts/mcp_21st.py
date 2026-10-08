#!/usr/bin/env python3
"""
CLI helper to interact with 21st.dev MCP API.
Endpoint: https://21st.dev/api/mcp
"""

import sys
import json
import argparse
import urllib.request
import urllib.error

# Ensure UTF-8 output on Windows
if sys.stdout.encoding != "utf-8":
    try:
        sys.stdout.reconfigure(encoding="utf-8")
        sys.stderr.reconfigure(encoding="utf-8")
    except Exception:
        pass

API_URL = "https://21st.dev/api/mcp"
API_KEY = "21st_sk_6226c2ebde0352f2be663619d25fe3b9f8ffa7a6bdec8c1443aa297ecdefc12b"

def call_mcp(method, params=None):
    headers = {
        "x-api-key": API_KEY,
        "Content-Type": "application/json"
    }
    payload = {
        "jsonrpc": "2.0",
        "id": 1,
        "method": method,
        "params": params or {}
    }
    req = urllib.request.Request(API_URL, data=json.dumps(payload).encode("utf-8"), headers=headers)
    try:
        with urllib.request.urlopen(req) as resp:
            return json.loads(resp.read().decode("utf-8"))
    except urllib.error.HTTPError as e:
        error_body = e.read().decode("utf-8")
        return {"error": {"code": e.code, "message": str(e), "body": error_body}}
    except Exception as e:
        return {"error": {"message": str(e)}}

def call_tool(name, arguments):
    res = call_mcp("tools/call", {"name": name, "arguments": arguments})
    return res

def cmd_list_tools(args):
    res = call_mcp("tools/list")
    if "result" in res and "tools" in res["result"]:
        tools = res["result"]["tools"]
        print(f"Total available tools: {len(tools)}\n")
        for t in tools:
            print(f"- {t['name']}: {t.get('description', '')[:80]}...")
    else:
        print(json.dumps(res, indent=2))

def cmd_search(args):
    arguments = {
        "query": args.query,
        "limit": args.limit
    }
    if args.type:
        arguments["type"] = args.type
    res = call_tool("search", arguments)
    if args.json:
        print(json.dumps(res, indent=2))
        return
    if "result" in res and "content" in res["result"]:
        for c in res["result"]["content"]:
            print(c.get("text", ""))
    else:
        print(json.dumps(res, indent=2))

def cmd_get_component(args):
    res = call_tool("get_component", {"id": args.id})
    if args.json:
        print(json.dumps(res, indent=2))
        return
    if "result" in res and "content" in res["result"]:
        for c in res["result"]["content"]:
            print(c.get("text", ""))
    else:
        print(json.dumps(res, indent=2))

def cmd_get_theme(args):
    res = call_tool("get_theme", {"id": args.id})
    if args.json:
        print(json.dumps(res, indent=2))
        return
    if "result" in res and "content" in res["result"]:
        for c in res["result"]["content"]:
            print(c.get("text", ""))
    else:
        print(json.dumps(res, indent=2))

def cmd_search_logo(args):
    res = call_tool("search_logo", {"query": args.query, "limit": args.limit})
    if args.json:
        print(json.dumps(res, indent=2))
        return
    if "result" in res and "content" in res["result"]:
        for c in res["result"]["content"]:
            print(c.get("text", ""))
    else:
        print(json.dumps(res, indent=2))

def cmd_inspiration(args):
    res = call_tool("get_inspiration", {"query": args.query})
    if args.json:
        print(json.dumps(res, indent=2))
        return
    if "result" in res and "content" in res["result"]:
        for c in res["result"]["content"]:
            print(c.get("text", ""))
    else:
        print(json.dumps(res, indent=2))

def main():
    parser = argparse.ArgumentParser(description="21st.dev MCP Client Helper")
    subparsers = parser.add_subparsers(dest="command")

    # list-tools
    subparsers.add_parser("list-tools", help="List all available tools")

    # search
    p_search = subparsers.add_parser("search", help="Search components, themes, templates")
    p_search.add_argument("query", help="Search query")
    p_search.add_argument("--type", choices=["component", "theme", "template", "all"], default="all")
    p_search.add_argument("--limit", type=int, default=5)
    p_search.add_argument("--json", action="store_true")
    p_search.set_defaults(func=cmd_search)

    # get-component
    p_comp = subparsers.add_parser("get-component", help="Fetch component source by demo ID")
    p_comp.add_argument("id", type=int, help="Demo ID")
    p_comp.add_argument("--json", action="store_true")
    p_comp.set_defaults(func=cmd_get_component)

    # get-theme
    p_theme = subparsers.add_parser("get-theme", help="Fetch theme CSS by UUID")
    p_theme.add_argument("id", help="Theme UUID")
    p_theme.add_argument("--json", action="store_true")
    p_theme.set_defaults(func=cmd_get_theme)

    # search-logo
    p_logo = subparsers.add_parser("search-logo", help="Search brand/vector logos")
    p_logo.add_argument("query", help="Logo search query")
    p_logo.add_argument("--limit", type=int, default=5)
    p_logo.add_argument("--json", action="store_true")
    p_logo.set_defaults(func=cmd_search_logo)

    # inspiration
    p_insp = subparsers.add_parser("inspiration", help="Get design inspiration")
    p_insp.add_argument("query", help="Inspiration query")
    p_insp.add_argument("--json", action="store_true")
    p_insp.set_defaults(func=cmd_inspiration)

    args = parser.parse_args()
    if args.command == "list-tools":
        cmd_list_tools(args)
    elif hasattr(args, "func"):
        args.func(args)
    else:
        parser.print_help()

if __name__ == "__main__":
    main()
