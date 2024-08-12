package com.mock.bodyguards.controller;

import com.mock.bodyguards.dto.example.ExampleRequest;
import com.mock.bodyguards.dto.ErrorResponse;
import com.mock.bodyguards.dto.SuccessResponse;
import com.mock.bodyguards.dto.example.ExampleResponse;
import com.mock.bodyguards.entity.Example;
import com.mock.bodyguards.service.IExampleService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.media.Content;
import io.swagger.v3.oas.annotations.media.Schema;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.responses.ApiResponses;
import io.swagger.v3.oas.annotations.tags.Tag;
import jakarta.validation.Valid;
import lombok.AllArgsConstructor;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

import java.time.LocalDateTime;

@Tag(
        name = "Example",
        description = "Example API"
)
@RestController
@RequestMapping("/api/v1/example")
@AllArgsConstructor
@Validated
public class ExampleController {
    private IExampleService exampleService;

    @Operation(
            summary = "Create example",
            description = "Create example"
    )
    @ApiResponses({
            @ApiResponse(
                    responseCode = "201",
                    description = "Example created successfully",
                    content = @Content(
                            mediaType = "application/json",
                            schema = @Schema(
                                    implementation = ExampleResponse.class
                            )
                    )
            ),
            @ApiResponse(
                    responseCode = "400",
                    description = "Bad request",
                    content = @Content(
                            mediaType = "application/json",
                            schema = @Schema(
                                    implementation = ErrorResponse.class
                            )
                    )
            )
    })
    @PostMapping("/create")
    public ResponseEntity<SuccessResponse> createExample(@Valid @RequestBody ExampleRequest exampleRequest) {

        ExampleResponse exampleResponse = exampleService.createExample(exampleRequest);
        return ResponseEntity
                .status(HttpStatus.CREATED)
                .body(SuccessResponse.builder()
                        .timestamp(LocalDateTime.now())
                        .statusCode(HttpStatus.CREATED)
                        .statusMessage("Example created successfully")
                        .data(exampleResponse)
                        .build());
    }
}
