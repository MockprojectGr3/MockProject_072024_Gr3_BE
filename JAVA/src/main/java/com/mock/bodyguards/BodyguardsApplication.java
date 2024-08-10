package com.mock.bodyguards;

import io.swagger.v3.oas.annotations.OpenAPIDefinition;
import io.swagger.v3.oas.annotations.info.Contact;
import io.swagger.v3.oas.annotations.info.Info;
import io.swagger.v3.oas.annotations.info.License;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
@OpenAPIDefinition(
		info = @Info(
				title = "Bodyguards",
				version = "1.0.0",
				description = "Bodyguards for hire for Spring Boot",
				contact = @Contact(
						name = "VietDoan",
						email = "doantv.dev@gmail.com"
				),
				license = @License(
						name = "Apache 2.0",
						url = "https://www.apache.org/licenses/LICENSE-2.0"
				)
		)
)
public class BodyguardsApplication {

	public static void main(String[] args) {
		SpringApplication.run(BodyguardsApplication.class, args);
	}

}
