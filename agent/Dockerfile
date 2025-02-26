FROM zabbix/zabbix-agent2:alpine-7.2-latest

USER root
# Install Go and Git (required for 'go get')
RUN apk add go git

# Install zabbix_agent_bench and move the binary to a global PATH
RUN go install github.com/cavaliercoder/zabbix_agent_bench@latest \
    && cp /root/go/bin/zabbix_agent_bench /usr/local/bin/

# Switch to the non-root zabbix user (as per base image)
USER zabbix
