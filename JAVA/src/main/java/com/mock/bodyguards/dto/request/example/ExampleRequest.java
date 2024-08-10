package com.mock.bodyguards.dto.request.example;

import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.NotEmpty;
import jakarta.validation.constraints.Pattern;
import lombok.Data;

@Data
@Schema(
    name = "ExampleDto",
    description = "Schema to hold example dto information"
)
public class ExampleRequest {
    @Schema(
        name = "name",
        description = "Name of the example",
        type = "String",
        example = "VietDoan"
    )
    @NotEmpty(message = "Name cannot be empty")
    private String name;

    @Schema(
        name = "email",
        description = "Email of the example",
        type = "String",
        example = "doantv.dev@gmail"
    )
    @NotEmpty(message = "Email cannot be empty")
    @Email(message = "Email is not valid")
    private String email;

    @Schema(
        name = "mobileNumber",
        description = "Mobile number of the example",
        type = "String",
        example = "0123456789"
    )
    @NotEmpty(message = "Mobile number cannot be empty")
    @Pattern(regexp = "(^$|[0-9]{10})", message = "Mobile number is not valid")
    private String mobileNumber;
}
