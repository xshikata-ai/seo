import random
import os

# List of words (100 per category, tailored for apps, mod apps, and pro apps)
actions = [
    "Download", "Install", "Get", "Try", "Access", "Explore", "Use", "Launch", "Open", "Discover",
    "Unlock", "Start", "Run", "Enjoy", "Browse", "Check", "View", "Test", "Grab", "Activate",
    "Download Now", "Install Now", "Get Now", "Try Now", "Access Now", "Explore Now", "Use Now",
    "Launch Now", "Open Now", "Discover Now", "Unlock Now", "Start Now", "Run Now", "Enjoy Now",
    "Browse Now", "Check Now", "View Now", "Test Now", "Grab Now", "Activate Now", "Download Fast",
    "Install Fast", "Get Fast", "Try Fast", "Access Fast", "Explore Fast", "Use Fast", "Launch Fast",
    "Open Fast", "Discover Fast", "Unlock Fast", "Start Fast", "Run Fast", "Enjoy Fast", "Browse Fast",
    "Check Fast", "View Fast", "Test Fast", "Grab Fast", "Activate Fast", "Download Instantly",
    "Install Instantly", "Get Instantly", "Try Instantly", "Access Instantly", "Explore Instantly",
    "Use Instantly", "Launch Instantly", "Open Instantly", "Discover Instantly", "Unlock Instantly",
    "Start Instantly", "Run Instantly", "Enjoy Instantly", "Browse Instantly", "Check Instantly",
    "View Instantly", "Test Instantly", "Grab Instantly", "Activate Instantly", "Download Pro",
    "Install Pro", "Get Pro", "Try Pro", "Access Pro", "Explore Pro", "Use Pro", "Launch Pro",
    "Open Pro", "Discover Pro", "Unlock Pro", "Start Pro", "Run Pro", "Enjoy Pro", "Browse Pro",
    "Check Pro", "View Pro", "Test Pro", "Grab Pro", "Activate Pro"
]

content_types = [
    "mod app", "pro app", "premium app", "unlocked app", "modded app", "pro version", "modified app",
    "premium version", "unlocked version", "mod application", "pro application", "premium application",
    "unlocked application", "modded application", "pro software", "premium software", "unlocked software",
    "modded software", "pro tool", "premium tool", "unlocked tool", "modded tool", "pro utility",
    "premium utility", "unlocked utility", "modded utility", "pro feature", "premium feature",
    "unlocked feature", "modded feature", "pro edition", "premium edition", "unlocked edition",
    "modded edition", "pro package", "premium package", "unlocked package", "modded package",
    "pro app version", "premium app version", "unlocked app version", "modded app version",
    "pro app edition", "premium app edition", "unlocked app edition", "modded app edition",
    "pro app tool", "premium app tool", "unlocked app tool", "modded app tool", "pro app utility",
    "premium app utility", "unlocked app utility", "modded app utility", "pro app feature",
    "premium app feature", "unlocked app feature", "modded app feature", "pro app package",
    "premium app package", "unlocked app package", "modded app package", "pro app software",
    "premium app software", "unlocked app software", "modded app software", "pro app version",
    "premium app version", "unlocked app version", "modded app version", "pro app tool",
    "premium app tool", "unlocked app tool", "modded app tool", "pro app utility",
    "premium app utility", "unlocked app utility", "modded app utility", "pro app feature",
    "premium app feature", "unlocked app feature", "modded app feature", "pro app package",
    "premium app package", "unlocked app package", "modded app package", "pro app software",
    "premium app software", "unlocked app software", "modded app software", "pro app edition",
    "premium app edition", "unlocked app edition", "modded app edition", "pro app version",
    "premium app version", "unlocked app version", "modded app version"
]

qualities = [
    "high performance", "smooth", "optimized", "fast", "stable", "premium", "enhanced", "pro-grade",
    "high speed", "ultra-fast", "reliable", "seamless", "top-tier", "advanced", "high quality",
    "pro quality", "premium performance", "optimized speed", "smooth operation", "stable performance",
    "fast response", "ultra-smooth", "high stability", "pro-level", "enhanced performance",
    "top performance", "reliable operation", "seamless experience", "advanced speed", "high efficiency",
    "pro efficiency", "premium speed", "optimized performance", "smooth functionality", "stable operation",
    "fast performance", "ultra-reliable", "high responsiveness", "pro responsiveness", "enhanced speed",
    "top speed", "reliable performance", "seamless functionality", "advanced performance", "high reliability",
    "pro reliability", "premium functionality", "optimized operation", "smooth performance", "stable functionality",
    "fast functionality", "ultra-performance", "high optimization", "pro optimization", "enhanced functionality",
    "top functionality", "reliable functionality", "seamless operation", "advanced functionality",
    "high functionality", "pro functionality", "premium operation", "optimized functionality",
    "smooth responsiveness", "stable responsiveness", "fast responsiveness", "ultra-optimized",
    "high smoothness", "pro smoothness", "enhanced responsiveness", "top responsiveness",
    "reliable responsiveness", "seamless responsiveness", "advanced responsiveness", "high speed performance",
    "pro speed performance", "premium speed performance", "optimized speed performance",
    "smooth speed performance", "stable speed performance", "fast speed performance",
    "ultra-speed performance", "high stability performance", "pro stability performance",
    "premium stability performance", "optimized stability performance", "smooth stability performance",
    "stable stability performance", "fast stability performance", "ultra-stability performance",
    "high reliability performance", "pro reliability performance", "premium reliability performance",
    "optimized reliability performance", "smooth reliability performance", "stable reliability performance",
    "fast reliability performance", "ultra-reliability performance"
]

features = [
    "unlocked features", "premium access", "ad-free", "offline mode", "custom themes", "advanced settings",
    "pro tools", "modded interface", "unlimited access", "dark mode", "multi-device support",
    "cloud sync", "high-speed downloads", "customizable UI", "pro filters", "unlocked tools",
    "premium themes", "ad-free experience", "offline access", "advanced customization", "pro utilities",
    "modded features", "unlimited usage", "secure sync", "fast installation", "custom options",
    "pro settings", "unlocked utilities", "premium interface", "ad-free usage", "offline support",
    "advanced tools", "pro customization", "modded settings", "unlimited features", "cloud support",
    "high-speed access", "custom interface", "pro options", "unlocked settings", "premium utilities",
    "ad-free interface", "offline features", "advanced utilities", "pro interface", "modded tools",
    "unlimited tools", "secure access", "fast downloads", "custom settings", "pro access",
    "unlocked interface", "premium settings", "ad-free features", "offline tools", "advanced interface",
    "pro features", "modded utilities", "unlimited utilities", "cloud access", "high-speed installation",
    "custom utilities", "pro utilities", "unlocked options", "premium options", "ad-free settings",
    "offline utilities", "advanced options", "pro tools", "modded options", "unlimited settings",
    "secure interface", "fast access", "custom features", "pro themes", "unlocked themes",
    "premium customization", "ad-free tools", "offline settings", "advanced settings", "pro utilities",
    "modded customization", "unlimited options", "cloud features", "high-speed features",
    "custom tools", "pro interface", "unlocked utilities", "premium tools", "ad-free utilities",
    "offline interface", "advanced themes", "pro customization", "modded themes", "unlimited themes",
    "secure settings", "fast settings", "custom utilities", "pro settings"
]

benefits = [
    "ad-free experience", "fast performance", "secure usage", "easy installation", "premium features",
    "no restrictions", "smooth operation", "high compatibility", "user-friendly", "unlocked access",
    "stable performance", "quick access", "modern design", "full control", "seamless experience",
    "secure downloads", "intuitive interface", "wide compatibility", "instant access", "premium experience",
    "no limits", "smooth functionality", "high reliability", "user comfort", "unlocked features",
    "stable operation", "fast installation", "modern interface", "complete access", "seamless performance",
    "secure access", "easy navigation", "premium functionality", "no interruptions", "smooth experience",
    "high stability", "quick performance", "intuitive design", "full customization", "unlocked tools",
    "stable functionality", "fast access", "modern functionality", "total control", "seamless operation",
    "secure installation", "easy access", "premium operation", "no restrictions", "smooth performance",
    "high performance", "quick functionality", "intuitive functionality", "full access", "unlocked utilities",
    "stable experience", "fast operation", "modern operation", "complete functionality", "seamless functionality",
    "secure performance", "easy operation", "premium performance", "no limits", "smooth operation",
    "high functionality", "quick experience", "intuitive experience", "full features", "unlocked settings",
    "stable access", "fast functionality", "modern performance", "total access", "seamless access",
    "secure functionality", "easy performance", "premium access", "no restrictions", "smooth access",
    "high access", "quick operation", "intuitive operation", "full utilities", "unlocked options",
    "stable settings", "fast experience", "modern experience", "complete operation", "seamless settings",
    "secure experience", "easy functionality", "premium settings", "no limits", "smooth settings",
    "high settings", "quick settings", "intuitive settings", "full settings"
]

platforms = [
    "mobile app", "application", "software", "app", "platform", "system", "tool", "utility",
    "pro app", "premium app", "modded app", "unlocked app", "mobile software", "app platform",
    "pro software", "premium software", "modded software", "unlocked software", "mobile tool",
    "pro tool", "premium tool", "modded tool", "unlocked tool", "mobile utility", "pro utility",
    "premium utility", "modded utility", "unlocked utility", "app system", "pro system",
    "premium system", "modded system", "unlocked system", "app platform", "pro platform",
    "premium platform", "modded platform", "unlocked platform", "mobile application",
    "pro application", "premium application", "modded application", "unlocked application",
    "app software", "pro software", "premium software", "modded software", "unlocked software",
    "mobile platform", "pro platform", "premium platform", "modded platform", "unlocked platform",
    "app tool", "pro tool", "premium tool", "modded tool", "unlocked tool", "mobile system",
    "pro system", "premium system", "modded system", "unlocked system", "app utility",
    "pro utility", "premium utility", "modded utility", "unlocked utility", "mobile app platform",
    "pro app platform", "premium app platform", "modded app platform", "unlocked app platform",
    "mobile app software", "pro app software", "premium app software", "modded app software",
    "unlocked app software", "mobile app tool", "pro app tool", "premium app tool",
    "modded app tool", "unlocked app tool", "mobile app utility", "pro app utility",
    "premium app utility", "modded app utility", "unlocked app utility", "app platform system",
    "pro platform system", "premium platform system", "modded platform system",
    "unlocked platform system", "mobile app system", "pro app system", "premium app system",
    "modded app system", "unlocked app system"
]

templates = [
    "{action} {content_type} with {quality} performance and {feature}.",
    "{action} {content_type} via {platform} with {feature} and {benefit}.",
    "{action} {content_type} with {feature} and {quality} performance.",
    "{action} {content_type} on {platform} supporting {feature} and {benefit}.",
    "{action} {content_type} with {quality} via {platform} for {benefit}.",
    "{action} {content_type} for {benefit} with {feature}.",
    "{action} {content_type} on {platform} with {quality} performance and {benefit}.",
    "{action} {content_type} offering {feature} and {benefit}.",
    "{action} {content_type} with {quality} and {feature} for {benefit}.",
    "{action} {content_type} on {platform} for {benefit} and {feature}.",
    "{action} {content_type} with {feature} for {benefit} on {platform}.",
    "{action} {content_type} via {platform} with {quality} and {feature}.",
    "{action} {content_type} supporting {feature} for {benefit}.",
    "{action} {content_type} with {quality} performance on {platform} for {benefit}.",
    "{action} {content_type} via {platform} for {benefit} with {feature}.",
    "{action} {content_type} with {feature} and {benefit} on {platform}.",
    "{action} {content_type} on {platform} with {feature} for {benefit}.",
    "{action} {content_type} offering {quality} performance and {feature}.",
    "{action} {content_type} with {benefit} via {platform} with {feature}.",
    "{action} {content_type} on {platform} for {feature} and {benefit}.",
    "{action} {content_type} with {quality} performance and {benefit} on {platform}.",
    "{action} {content_type} via {platform} with {feature} for {benefit}.",
    "{action} {content_type} supporting {quality} and {feature} on {platform}.",
    "{action} {content_type} with {feature} for {quality} performance and {benefit}.",
    "{action} {content_type} on {platform} with {benefit} and {feature}.",
    "{action} {content_type} via {platform} for {quality} performance and {benefit}.",
    "{action} {content_type} with {feature} and {quality} performance for {benefit}.",
    "{action} {content_type} on {platform} offering {feature} and {benefit}.",
    "{action} {content_type} with {benefit} and {feature} via {platform}.",
    "{action} {content_type} for {feature} with {quality} performance on {platform}.",
    "{action} {content_type} via {platform} with {benefit} and {quality} performance.",
    "{action} {content_type} supporting {feature} and {benefit} on {platform}.",
    "{action} {content_type} with {quality} performance for {benefit} and {feature}.",
    "{action} {content_type} on {platform} with {feature} and {quality} performance.",
    "{action} {content_type} via {platform} for {feature} with {benefit}.",
    "{action} {content_type} with {benefit} and {quality} performance on {platform}.",
    "{action} {content_type} offering {feature} for {benefit} on {platform}.",
    "{action} {content_type} with {feature} and {benefit} for {quality} performance.",
    "{action} {content_type} on {platform} for {quality} performance with {feature}.",
    "{action} {content_type} via {platform} with {feature} and clear {benefit}.",
    "{action} {content_type} with {quality} performance and {feature} for {benefit}.",
    "{action} {content_type} on {platform} supporting {benefit} and {feature}.",
    "{action} {content_type} for {benefit} with {quality} performance on {platform}.",
    "{action} {content_type} via {platform} for {feature} and {quality} performance.",
    "{action} {content_type} with {feature} for {benefit} with {quality} performance.",
    "{action} {content_type} on {platform} with {benefit} for {feature}.",
    "{action} {content_type} offering {quality} performance for {benefit}.",
    "{action} {content_type} with {feature} and clear {benefit} via {platform}.",
    "{action} {content_type} for {quality} performance with {feature} on {platform}.",
    "{action} {content_type} via {platform} with {benefit} for {feature}.",
    "{action} {content_type} with {quality} performance and {benefit} for {feature}.",
    "{action} {content_type} on {platform} for {benefit} with {quality} performance.",
    "{action} {content_type} supporting {feature} with {benefit} on {platform}.",
    "{action} {content_type} with {feature} for {quality} performance on {platform}.",
    "{action} {content_type} via {platform} for clear {benefit} and {feature}.",
    "{action} {content_type} with {benefit} and {feature} for {quality} performance.",
    "{action} {content_type} on {platform} with {quality} performance for {benefit}.",
    "{action} {content_type} offering {feature} and {quality} performance on {platform}.",
    "{action} {content_type} with {feature} and {benefit} for clear {platform}.",
    "{action} {content_type} for {benefit} with {feature} and {quality} performance.",
    "{action} {content_type} via {platform} with {feature} for {quality} performance.",
    "{action} {content_type} with {quality} performance and {feature} on clear {platform}.",
    "{action} {content_type} on {platform} for {feature} with clear {benefit}.",
    "{action} {content_type} supporting {benefit} and {quality} performance on {platform}.",
    "{action} {content_type} with {feature} for clear {benefit} via {platform}.",
    "{action} {content_type} for {quality} performance and {benefit} on {platform}.",
    "{action} {content_type} via {platform} with {quality} performance for {feature}.",
    "{action} {content_type} with clear {benefit} and {feature} on {platform}.",
    "{action} {content_type} offering {benefit} for {feature} on {platform}.",
    "{action} {content_type} with {quality} performance for {feature} and {benefit}.",
    "{action} {content_type} on {platform} with {feature} for {quality} performance.",
    "{action} {content_type} via {platform} for {quality} performance with {benefit}.",
    "{action} {content_type} with {feature} and {quality} performance on clear {platform}.",
    "{action} {content_type} supporting {feature} for {quality} performance on {platform}.",
    "{action} {content_type} with {benefit} for {feature} and {quality} performance.",
    "{action} {content_type} on {platform} for clear {benefit} and {quality} performance.",
    "{action} {content_type} via {platform} with {feature} and premium {benefit}.",
    "{action} {content_type} with {quality} performance and {benefit} on premium {platform}.",
    "{action} {content_type} offering {feature} for {quality} performance on {platform}.",
    "{action} {content_type} with {feature} and {benefit} for premium {platform}.",
    "{action} {content_type} for {benefit} with {quality} performance and {feature}.",
    "{action} {content_type} via {platform} for {feature} and premium {benefit}.",
    "{action} {content_type} with {quality} performance for clear {benefit} on {platform}.",
    "{action} {content_type} on {platform} with {feature} and premium {quality} performance.",
    "{action} {content_type} supporting clear {benefit} for {feature} on {platform}.",
    "{action} {content_type} with {feature} for {quality} performance and premium {benefit}.",
    "{action} {content_type} via {platform} with {benefit} for {quality} performance.",
    "{action} {content_type} with {quality} performance and {feature} for clear {benefit}.",
    "{action} {content_type} on {platform} for {feature} with premium {quality} performance.",
    "{action} {content_type} offering {benefit} and {feature} for {quality} performance.",
    "{action} {content_type} with {feature} and {quality} performance for premium {benefit}.",
    "{action} {content_type} via {platform} for {quality} performance and clear {feature}.",
    "{action} {content_type} with {benefit} and {feature} on premium {platform}.",
    "{action} {content_type} supporting {feature} and {benefit} for {quality} performance.",
    "{action} {content_type} with {quality} performance for {feature} on clear {platform}.",
    "{action} {content_type} on {platform} with {benefit} and {feature} for {quality} performance."
]

def generate_description():
    template = random.choice(templates)
    description = template.format(
        action=random.choice(actions),
        content_type=random.choice(content_types),
        quality=random.choice(qualities),
        feature=random.choice(features),
        benefit=random.choice(benefits),
        platform=random.choice(platforms)
    )
    # Ensure length is 10-20 words
    words = description.split()
    if len(words) > 20:
        description = " ".join(words[:20])
    elif len(words) < 10:
        description += f" with {random.choice(benefits)}."
    return description.strip()

def generate_unique_descriptions(num_descriptions):
    descriptions = set()
    while len(descriptions) < num_descriptions:
        desc = generate_description()
        # Ensure unique and correct length
        if 10 <= len(desc.split()) <= 20 and desc not in descriptions:
            descriptions.add(desc)
    return list(descriptions)

def save_descriptions(descriptions, output_file="app_descriptions.txt"):
    with open(output_file, "w", encoding="utf-8") as f:
        for desc in descriptions:
            f.write(desc + "\n")
    print(f"Successfully saved {len(descriptions)} descriptions to {output_file}")

if __name__ == "__main__":
    # Generate 3000 descriptions
    num_descriptions = 10000
    descriptions = generate_unique_descriptions(num_descriptions)
    save_descriptions(descriptions, "app_descriptions.txt")